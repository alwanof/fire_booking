<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rinvex\Bookings\Models\BookableBooking;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::where('user_id', Auth()->user()->id)->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function reservation_form($username )
    {
        $provider = User::where('username',$username)->first();
        return view('v2.customer_page',compact('provider'));
    }
    public function reservation($username,Request $request )
    {
        $provider = User::where('username',$username)->first();
        $customer  = Customer::where('email',$request->email)->first();
        if($customer){
            $booking =  $customer->bookings()->where('booking_key',$request->booking_key)->first();
            if (!isset($booking->id)){
                abort(404);
            }
            return view('v2.reservation_details',compact('provider','booking','customer'));
        }else{
            echo "error";
        }
    }
    public function reservation_cancel_process($username , Request $request){
            $provider = User::where('username',$username)->first();
            $customer = Customer::find($request->customer_id);
            $booking = $customer->bookings()->find($request->booking_id);
            $booking->notes = $request->notes;
            $booking->status = 2;
            return redirect()->route('provider',$provider->username);
    }
    public function reservation_cancel($username , Request $request){
        $provider = User::where('username',$username)->first();
        $customer = Customer::find($request->customer_id);
        $booking = $customer->bookings()->find($request->booking_id);
        $service = $booking->bookable_type::find($booking->bookable_id);
        if ($service->CancelPolicy){
                    $cancel_policy = $service->CancelPolicy;

        }else{
             $cancel_policy = null;
        }
        return view('v2.reservation_cancel',compact('provider','customer','booking','cancel_policy'));

    }

    public function reservations(Customer $customer)
    {
        $bookings = $customer->bookings;
        return view('customer.reservations', compact('bookings', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
