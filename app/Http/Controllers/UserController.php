<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth ;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(User $user)
    {   
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(User $user,Request $request)
    { 
        // dd(request()->all());
    
        
        $user->name = $request->name;

        $user->password = bcrypt($request->new_password);
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/avatars/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
            $user->avatar =  asset('/uploads/avatars/'. $filename);

            }

        $user->save();

        return back();
    }
}
