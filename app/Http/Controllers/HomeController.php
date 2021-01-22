<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use App\User;
use App\UserModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailManager;
use App\Category;

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
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }
     public function mind(Request $request)
    {

        $mail =  Mail::send(['html'=>'mail'],['guest_name'=>$_GET['guest_name'],'guest_email'=>$_GET['guest_email']], function($message) {
            $message->to('aboodma@gmail.com', 'Meaza Food')->subject
               ('New Mail ');
            $message->from('sales@meazafood.com','Meazafood');
        });

    }

    public function provider(string $username)
    {

        $provider = User::where('username', $username)->first();
        $models = $provider->UserModels;
        $categories = $provider->Categories;
        return view('v2.index', compact('models', 'provider', 'username', 'categories'));


    }

    public function preview(Request $request)
    {

        return view('v2.index');
    }
    public function reservation_form( User $provider,Request $request,Service $service){
//        return $request->all();
        return view('v2.step_4',compact('request','provider','service'));
    }

    public function reservation(Request $request)
    {
//        return $request->all();
        $provider = User::find($request->user_id);
        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) {
            $customer = new Customer;
            $customer->name = $request->custom[1]->Name;
            $customer->email = $request->email;
            $customer->user_id = $request->user_id;
            $customer->save();
        }
        $service = Service::find($request->service_id);
        $c_date = date('Y/m/d', strtotime($request->date));
        $start_date = $c_date . " " . $request->time;
        $c_start_date = strtotime($start_date);
        $c_end_date = strtotime(" + " . $service->duration . "minutes", $c_start_date);
        $end_date = date('Y/m/d h:i', $c_end_date);
        $booking = $customer->newBooking($service, $start_date, $end_date, $request->user_id);
        $key = $booking->booking_key;
        $email = $customer->email;
        $name = $customer->name;
        Mail::to($email)->send(new MailManager($name, $key, $email, $booking));
        return view('v2.finish', compact('name', 'email', 'key','provider'));
    }

    public function ProviderCategory($username, Category $category)
    {
        $provider = User::where('username', $username)->first();
        $models = $category->Models;

        return view('v2.single', compact('models', 'provider','category'));
    }

    public function ProviderServices(Request $request,$username, UserModel $model)
    {
        $provider = User::where('username', $username)->first();
        $service = Service::find($request->service);
        return view('v2.step_3', compact('service', 'provider'));

    }

}
