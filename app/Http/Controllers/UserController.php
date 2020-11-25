<?php

namespace App\Http\Controllers;

use App\Mail\MailManager;
use Illuminate\Http\Request;
use App\User;
use Auth ;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Mail;
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
            $user->avatar =  '/uploads/avatars/'. $filename;
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
    public function slugify($text)
      {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
          return 'n-a';
        }

        return $text;
      }
    public function store(Request $request)
    {
      // return  $this->slugify($request->name);
        $request = app('request');
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path  = public_path('/uploads/avatars/' . $filename);
            $uploaded_avatar = Image::make($avatar)->resize(300, 300)->save( $path );
        }
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar'=> '/uploads/avatars/'. $filename,
            'username' => $this->slugify($request->name),
        ]);

        if($user){
            $role = $request->role;
            $user->syncRoles($role);
            return back();
        }



        return redirect()->route('users.all');
    }

    public function reservations_pending (){
       $reservations =  Auth()->user()->Bookings->where('status',0);
       return view('users.reservations',compact('reservations'));
    }
    public function reservations_completed (){
        $reservations =  Auth()->user()->Bookings->where('status',1);
        return view('users.reservations',compact('reservations'));
    }
    public function reservations_rejected (){
        $reservations =  Auth()->user()->Bookings->where('status',2);
        return view('users.reservations',compact('reservations'));
    }
    public function reservations_completed_mark (Request $request){
       $booking = Auth()->user()->Bookings->where('booking_key',$request->booking_key)->first();
       if ($booking){

           $booking->status = 1;

          $booking->save();
          $customer = $booking->customer_type::find($booking->customer_id);
           Mail::to($customer->email)->send(
               new MailManager($customer->name,
                   $request->booking_key,
                   $customer->email,$booking,"Completed"));

           return response()->json(["status"=>200,"data"=>$booking]);
       }else{
           return response()->json(["status"=>600]);
       }
    }
    public function reservations_rejected_mark (Request $request){
        $booking = Auth()->user()->Bookings->where('booking_key',$request->booking_key)->first();
        if ($booking){

            $booking->notes = $request->notes;
            $booking->status = 2;

            $booking->save();
            return response()->json(["status"=>200,"data"=>$booking]);
        }else{
            return response()->json(["status"=>600]);
        }
    }


}
