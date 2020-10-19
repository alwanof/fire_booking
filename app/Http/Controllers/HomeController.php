<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                
        $website = new Website();
        app(WebsiteRepository::class)->create($website);

        $hostname = new Hostname();
        $hostname->fqdn = 'foo1.tenancy.localhost';
        app(HostnameRepository::class)->attach($hostname, $website);
    }
  
}
