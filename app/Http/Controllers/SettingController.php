<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use App\Configuration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use App\RoleConfiguration;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $configurations = auth()->user()->GetAvilableConfig();
        $settings = Setting::all();
        return view('settings.index', compact('settings', 'configurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => ['required', 'string', 'max:255'],
            'configuration_id' => ['required']

        ]);
        $setting = new Setting;
        $setting->value = $request->value;
        $setting->configuration_id = $request->configuration_id;
        $setting->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setting $setting
     * @return Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Setting $setting
     * @return Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return Response
     */
    public function destroy(Setting $setting)
    {
       if ( $setting->delete()){
           return redirect()->route('settings.index');
       }
    }
}
