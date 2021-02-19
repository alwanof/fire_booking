<?php

namespace App\Http\Controllers;

use App\Argument;
use App\User;
use Illuminate\Http\Request;

class ArgumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arguments = Argument::all();
        return  view('argument.index',compact('arguments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('argument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $argument = new Argument;
        $argument->title = $request->title;
        $argument->description = $request->description;
        $argument->is_active = $request->is_active;
        if ($argument->save()){

            if ($request->has('submit_back')){
                return back();
            }else{
                return redirect()->route('arguments.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function provider_arguments($username)
    {
        $provider = User::where('username',$username)->first();
        $arguments = Argument::where('is_active',true)->get();
     return view('v2.arguments',compact('provider','arguments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function edit(Argument $argument)
    {
        return view('argument.edit',compact('argument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Argument $argument)
    {
        $argument->title = $request->title;
        $argument->description = $request->description;
        $argument->is_active = $request->is_active ;
        if ($argument->save()){

            if ($request->has('submit_back')){
                return back();
            }else{
                return redirect()->route('arguments.index');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Argument  $argument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Argument $argument)
    {
        if($argument->delete()){
            return redirect()->route('arguments.index');
        }else{
            return redirect()->route('arguments.index');
        }
    }
}
