<?php

namespace App\Http\Controllers;

use App\CategoryImage;
use App\UserModelImage;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserModelImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserModelImage  $userModelImage
     * @return \Illuminate\Http\Response
     */
    public function show(UserModelImage $userModelImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserModelImage  $userModelImage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserModelImage $userModelImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserModelImage  $userModelImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserModelImage $userModelImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserModelImage  $userModelImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModelImage $userModelImage)
    {
        //
    }
    public function delete(UserModelImage $userModelImage)
    {
        try {
            $userModelImage->delete();
            return Response()->json(['status'=>200]);
        }catch (Exception $e){
            return Response()->json(['status'=>303]);

        }
    }
}
