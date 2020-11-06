<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use App\ServiceTime;
use App\UserModel;
use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;
class ServiceController extends Controller
{

    public function __construct()
    {
      // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = UserModel::all();
        return view('services.create',compact('models'));
    }

    public function TimeSchemaCreator(Request $request)
    {

      $duration = $request->duration;
      $dates =  $this->date_range($request->start_date,$request->end_date);
      $times =   $this->get_hours_range(0,86400,$duration*60,'g:i');
      return view('services.timeSchema',compact('times','dates'));
    }
    function date_range($first, $last, $step = '+1 day', $output_format = 'Y/m/d' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

    public function get_hours_range( $start = 0, $end = 86400, $step = 3600, $format = 'g:i a' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      $request->validate([
          'title' => ['required'],
          'description' => ['required'],
          'user_model_id' => ['required'],
          'price' => ['required'],
          'discount_price' => ['required'],
          'amount' => ['required'],
          'duration' => ['required'],
          'avatar' => ['required']

      ]);
      $service = new Service;
      $service->title  = $request->title;
      $service->description  = $request->description;
      $service->user_model_id  = $request->user_model_id;
      $service->price  = $request->price;
      $service->discount_price  = $request->discount_price;
      $service->amount  = $request->amount;
      $service->duration  = $request->duration;
      $service->avatar  = $request->avatar;
      if($service->save()){
        foreach ($request->times as $value) {
          $valued = explode('-',$value);
          $serviceTimes = new ServiceTime;
          $serviceTimes->service_id = $service->id;
          $serviceTimes->date = $valued[0];
          $serviceTimes->time = $valued[1];
          $serviceTimes->save();
        }
        return redirect()->route('services.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $models = UserModel::all();
        $times = $service->serviceTimes;
        $start_date = $times->min('date');
        $end_date = $times->max('date');
        $dates =  $this->date_range($start_date,$end_date);
        $times_ava =   $this->get_hours_range(0,86400,$service->duration*60,'g:i');
        return view('services.edit',compact('service','models','start_date','end_date','times_ava','dates'));
    }
    public function getDates(Service $service)
    {

      return view('services.datep',compact('service'));
    }
    public function getModels($category)
    {
      $models = Category::find($category)->Models;
      return view('reservation.models',compact('models'));
    }
    public function getTimes(Service $service,$date)
    {
      $c_date= date('Y/m/d', $date);
      $t_date= date('Y-m-d', $date);
      $times=  $service->serviceTimes->where('date',$c_date);
      $amount = $service->amount;

      return view('services.timep',compact('times','t_date','amount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
      if ($service->delete()) {
        return redirect()->back();
      }
    }
}
