<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\RoleConfiguration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $configurations = Configuration::all();
        $roles = Configuration::GetRoles();
        return view('configurations.index', compact('configurations', 'roles'));
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
            'key' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string']

        ]);
        $config = new Configuration;
        $config->key = $request->key;
        $config->value = $request->value;
        // $config->role_id = $request->role_id;
        if ($config->save()) {
            $role_configuration = new RoleConfiguration;
            $role_configuration->role_id = $request->role_id;
            $role_configuration->configuration_id = $config->id;
            $role_configuration->save();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Configuration $configuration
     * @return Response
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Configuration $configuration
     * @return Response
     */
    public function edit(Configuration $configuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Configuration $configuration
     * @return Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Configuration $configuration
     * @return Response
     */
    public function destroy(Configuration $configuration)
    {
        //
    }
}
