<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_pers = Permission::all();
       return view('roles.create',compact('all_pers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'name' => ['required', 'string']

      ]);
        // return $request->all();
        $role = Role::create(['name' => $request->name]);
        foreach ($request->roles as $permission_id) {
        $role->givePermissionTo($permission_id);
        }

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $all_pers = Permission::all();
        $permissions = $role->Permissions;
        return view('roles.edit',compact('role','permissions','all_pers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      $request->validate([
          'name' => ['required', 'string']

      ]);
        $role->name = $request->name;
        $new_per = [];
        foreach($request->roles as $permission_id){
            $new_per[] =$permission_id;
        }
        $role->syncPermissions($new_per);
        if($role->save()){

            return redirect()->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role_users =$role->Users;
        $default_role = config('permission.default_role');
        foreach ($role_users as $user) {
            $user->syncRoles($default_role);
        }
        if($role->delete()){
            return redirect()->back();
        }

    }
}
