<?php

namespace App\Http\Controllers;

use App\AgeGroupDiscount;
use Illuminate\Http\Request;

class AgeGroupDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ageGroupDiscount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $age_group = new AgeGroupDiscount();
       $age_group->age_range = $request->age_range;
       $age_group->discount_value  = $request->value;
       if ($age_group->save()){
           return redirect()->route('age_group_discount.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AgeGroupDiscount  $ageGroupDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(AgeGroupDiscount $ageGroupDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgeGroupDiscount  $ageGroupDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(AgeGroupDiscount $ageGroupDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgeGroupDiscount  $ageGroupDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgeGroupDiscount $ageGroupDiscount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AgeGroupDiscount  $ageGroupDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgeGroupDiscount $ageGroupDiscount)
    {
        //
    }
}
