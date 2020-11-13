<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailManager;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function provider(String $username)
    {

        $provider = \App\User::where('username',$username)->first();
        $models =  $provider->UserModels;
        $categories = $provider->Categories;
        return view('reservation.provider',compact('models','provider','username','categories'));


    }
    public function reservation(Request $request)
    {
      // return $request->all();
      $customer = \App\Customer::where('email',$request->email)->first();
      if(!$customer){
      $customer = new \App\Customer;
      $customer->name = $request->name;
      $customer->email = $request->email;
      $customer->user_id = $request->user_id;
      $customer->save();
      }
      $service = \App\Service::find($request->service_id);
      $c_date= date('Y/m/d', $request->date);
        $start_date = $c_date." ".$request->time;
      $c_start_date =  strtotime($start_date);
      $c_end_date =  strtotime(" + ".$service->duration."minutes",$c_start_date);
        $end_date= date('Y/m/d h:i', $c_end_date);
      $booking  = $customer->newBooking($service, $start_date, $end_date);
      $key = $booking->booking_key;
      $email = $customer->email;
      $name = $customer->name;
      // $data = array('name'=>$name,'key'=>$key,'email'=>$email);

      Mail::to($email)->send(new MailManager($name,$key,$email));
          // $mail =   Mail::send(['html'=>'mail'], $data, function($message) {
          //   dd($this->request);
          //      $message->to($request->email, $request->name)->subject
          //         ('2urkey Booking | New Booking ');
          //      $message->from('info@2urkeybooking.com','2urkey Booking');
          //   });
      return view('reservation.thanks',compact('name','email','key'));
    }

}
