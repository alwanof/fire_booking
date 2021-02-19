<?php

namespace App\Http\Controllers;

use App\CancelPolicy;
use App\CancelPolicyServices;
use Illuminate\Http\Request;

class CancelPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = CancelPolicy::all();
        return  view('cancelPolicy.index',compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cancelPolicy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policy = new CancelPolicy;
        $policy->name = $request->name;
        $policy->release_time = $request->release_time;
        $policy->penalty = $request->penalty;
        $policy->description = $request->description;

        if ($policy->save()){

            if ($request->has('submit_back')){
                return back();
            }else{
                return redirect()->route('cancel_policy.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CancelPolicy  $cancelPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(CancelPolicy $cancelPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CancelPolicy  $cancelPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(CancelPolicy $cancelPolicy)
    {
        return view('cancelPolicy.edit',compact('cancelPolicy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CancelPolicy  $cancelPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CancelPolicy $cancelPolicy)
    {

        $cancelPolicy->name = $request->name;
        $cancelPolicy->release_time = $request->release_time;
        $cancelPolicy->penalty = $request->penalty;
        $cancelPolicy->description = $request->description;

        if ($cancelPolicy->save()){

            if ($request->has('submit_back')){
                return back();
            }else{
                return redirect()->route('cancel_policy.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CancelPolicy  $cancelPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancelPolicy $cancelPolicy)
    {

        if ($cancelPolicy->delete()){
            return redirect()->route('cancel_policy.index');
        }
    }
}
