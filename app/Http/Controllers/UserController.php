<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth ;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(User $user)
    {
        return view('users.profile', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user,Request $request)
    {

        $user->name = $request->name;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }

        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/avatars/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
            $user->avatar =  asset('/uploads/avatars/'. $filename);
            }

            if($user->save()){
                $role = $request->role;
                $user->syncRoles($role);
                return back();
            }

    }

    public function index()
    {
        $users = User::where('is_deleted',false)->paginate(20);
        return view('users.index',compact('users') );
    }
    public function delete(User $user)
    {
        $user->is_deleted  = true;
        $user->save();
        return true;
    }
    public function create()
    {
       return view('users.create');
    }
    public function store(Request $request)
    {
        $request = app('request');
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/avatars/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
        }
        $create =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar'=> asset('/uploads/avatars/'. $filename),
        ]);


        return redirect()->route('users.all');
    }

    
}
