<?php

namespace App\Http\Controllers;


use App\Customer;
use App\Rate;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function rate($id, Customer $customer)
    {

        $service = Service::findOrFail(decrypt($id));
        return view('reservation.rate_service', compact('customer', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $customer = Customer::find($request->customer_id);
        $rate = new Rate();
        $rate->service_id = Service::find(decrypt($request->service_id))->id;
        $rate->name = $customer->name;
        $rate->email = $customer->email;
        $rate->rate = $request->rate;
        $rate->note = $request->note;
        if ($rate->save()) {
            return redirect()->back();

        } else {
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Rate $rate
     * @return Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rate $rate
     * @return Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rate $rate
     * @return Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rate $rate
     * @return Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
