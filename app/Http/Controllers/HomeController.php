<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use App\Service;
use App\User;
use App\UserModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailManager;
use App\Category;
use Rinvex\Bookings\Models\BookableBooking;

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

        $mail = Mail::send(['html' => 'mail'], ['guest_name' => $_GET['guest_name'], 'guest_email' => $_GET['guest_email']], function ($message) {
            $message->to('aboodma@gmail.com', 'Meaza Food')->subject
            ('New Mail ');
            $message->from('sales@meazafood.com', 'Meazafood');
        });

    }

    public function provider(string $username)
    {

        $provider = User::where('username', $username)->first();
        $models = $provider->UserModels ?? "";
        $categories = $provider->Categories ?? "";
        return view('v2.index', compact('models', 'provider', 'username', 'categories'));


    }

    public function preview(Request $request)
    {

        return view('v2.index');
    }

    public function reservation_form(User $provider, Request $request, Service $service)
    {
//        return $request->all();
        $person = 0;
        $personsArray = [];
        if ($request->has('person_count')) {
            foreach ($request->person_count as $key => $value) {
                $person += $value;
                $personsArray [] = ['ageGroupDiscountId' => $key, 'personCount' => $value];
            }
        } elseif ($request->has('p_count')) {
            $person = $request->p_count;
        }
        return view('v2.step_4', compact('request', 'provider', 'service', 'person', 'personsArray'));
    }

    public function search($username, Request $request)
    {
        $provider = User::where('username', $username)->first();
        $services = $provider->Services()->where('title', 'LIKE', '%' . $request->q . '%')
            ->orWhere('description', 'LIKE', '%' . $request->q . '%');
        if ($request->has('order')) {
            if ($request->order == 1) {
                $services->orderBy('title');
            } elseif ($request->order == 2) {
                $services->orderByDesc('title');
            } elseif ($request->order == 3) {
                $services->orderBy('created_at');
            } elseif ($request->order == 4) {
                $services->orderByDesc('created_at');
            }
        }

        $services = $services->get();


        return view('v2.search', compact('provider', 'services', 'request'));
    }

    public function reservation(Request $request)
    {
//        return $request->all();
        $guests = json_encode($request->custom, true);
        $asi = json_encode($request->additional_service_info, true);

        $provider = User::find($request->user_id);
        $customer = Customer::where('email', $request->email)->first();
        if (!$customer) {
            $customer = new Customer;
            $customer->name = $request->name;
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
        $exData = array(
            'amount' => $request->amount,
            'guests' => $guests,
            'asi' => $asi,
        );

//dd($service,$customer,$c_date, $c_start_date, $end_date);
// Create a new booking via customer model (resource, starts, ends)
//        $service->newBooking($customer, '2022-02-19 8:00:00', '2022-02-19 9:00:00');

        $booking = $customer->newBooking($service, $c_start_date, $c_end_date);


//            $booking = BookableBooking::query()->find(1);
//        dd($service, $start_date, $end_date);
        $booking->price = $request->total_price;
        $booking->total_paid = $request->total_price;
        $booking->quantity = $request->amount;
//        $booking->guests = $guests;
//        $booking->asi = $asi;
        $booking->notes = $request->notes;
        $booking->save();
//        $key = $booking->booking_key;
        $key = 1;
        $email = $customer->email;
        $name = $customer->name;
//        Mail::to($email)->send(new MailManager($name, $key, $email, $booking));
        return view('v2.finish', compact('name', 'email', 'key', 'provider', 'booking', 'service'));
    }

    public function ProviderCategory($username, Category $category)
    {
        $provider = User::where('username', $username)->first();
        $models = $category->Models;

        return view('v2.single', compact('models', 'provider', 'category'));
    }

    public function ProviderServices(Request $request, $username, UserModel $model)
    {
        $provider = User::where('username', $username)->first();
        $service = Service::find($request->service);
        return view('v2.step_3', compact('service', 'provider'));

    }

    public function mailTest()
    {
        $name = "test";
        $key = "test";
        $email = "test";
        $data = User::find(9)->Bookings->find(25);
        return view('mailing.mail', compact('name', 'key', 'email', 'data'));
    }

}
