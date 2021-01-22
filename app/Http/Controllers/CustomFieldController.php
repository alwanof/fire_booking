<?php

namespace App\Http\Controllers;

use App\CustomField;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('customFields.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customFields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = new CustomField();
        $field->input_name = $request->input_name;
        $field->input_type = $request->input_type;
        $field->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function show(CustomField $customField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomField $customField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomField $customField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomField $customField)
    {
        //
    }
}
