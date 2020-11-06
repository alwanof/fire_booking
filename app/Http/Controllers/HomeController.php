<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      $customer = new \App\Customer;
      $customer->name = $request->name;
      $customer->email = $request->email;
      $customer->user_id = $request->user_id;
      $customer->save();

      $service = \App\Service::find($request->service_id);
      $c_date= date('Y/m/d', $request->date);
        $start_date = $c_date." ".$request->time;
      $c_start_date =  strtotime($start_date);
      $c_end_date =  strtotime(" + ".$service->duration."minutes",$c_start_date);
        $end_date= date('Y/m/d h:i', $c_end_date);
      $booking  = $customer->newBooking($service, $start_date, $end_date);
      echo "Booking Key :". $booking->booking_key;
    }

}
