<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use App\ServiceTime;
use App\ServiceImage;
use App\UserModel;
use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
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
      $times =   $this->get_hours_range($request->start_hours,$request->end_hours,$duration*60,'g:i');
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
        $discount = $this->calcDiscount($request->discount_price , $request->price);
      $service = new Service;
      $service->title  = $request->title;
      $service->description  = $request->description;
      $service->user_model_id  = $request->user_model_id;
      $service->price  = $request->price;
      $service->discount_price  = $discount;
      $service->amount  = $request->amount;
      $service->duration  = $request->duration;
      $service->avatar  = "test";
      if($service->save()){
        foreach ($request->times as $value) {
          $valued = explode('-',$value);
          $serviceTimes = new ServiceTime;
          $serviceTimes->service_id = $service->id;
          $serviceTimes->date = $valued[0];
          $serviceTimes->time = $valued[1];
          $serviceTimes->save();
        }
        if($request->hasfile('avatar')){

            $a=1;
                foreach ($request->avatar as $key => $photo) {
                    $service_image = new ServiceImage ;
                    $service_image->service_id = $service->id;
                    $MimeType = explode ("/",$photo->getMimeType());
                    $filename = "S-".$service->id."-".time() . '-'.$a.'.' . $MimeType[1];
                    $path  = public_path('/uploads/services/' . $filename);
                    $uploaded_avatar = Image::make($photo)->resize(300, 300)->save( $path );
                    $service_image->path = '/uploads/services/'. $filename;
                    $service_image->save();
                    $a++;
                }
            }else {
              // echo "no p";
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
    public function calcDiscount($discount_price , $price ){
        if (strpos($discount_price,'%')){
            $discount_price  = str_replace("%", "",$discount_price);

            $y = ($discount_price * $price)/100;
             $discount  = $price - $y ;

        }else{
             $discount = $price - $discount_price;

        }
        return $discount;
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
        $start_date = date("Y-m-d",strtotime($times->min('date')));
        $end_date = date("Y-m-d",strtotime($times->max('date')));

        $dates =  $this->date_range($times->min('date'),$times->max('date'));
        $times_ava =   $this->get_hours_range(0,86400,$service->duration*60,'g:i');
//        return $start_date;
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

      return view('services.timep',compact('service','times','t_date','amount'));
    }
    public function Rates (Service $service){
       $rates =  $service->Rateer;
       return view('services.rates',compact('rates'));
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
        $discount = $this->calcDiscount($request->discount_price , $request->price);
       $service->serviceTimes()->delete();
        $service->title  = $request->title;
        $service->description  = $request->description;
        $service->user_model_id  = $request->user_model_id;
        $service->price  = $request->price;
        $service->discount_price  = $discount;
        $service->amount  = $request->amount;
        $service->duration  = $request->duration;
        $service->avatar  = "test";
        if($service->save()){
            foreach ($request->times as $value) {
                $valued = explode('-',$value);
                $serviceTimes = new ServiceTime;
                $serviceTimes->service_id = $service->id;
                $serviceTimes->date = $valued[0];
                $serviceTimes->time = $valued[1];
                $serviceTimes->save();
            }
            if($request->hasfile('avatar')){

                $a=1;
                foreach ($request->avatar as $key => $photo) {
                    $service_image = new ServiceImage ;
                    $service_image->service_id = $service->id;
                    $MimeType = explode ("/",$photo->getMimeType());
                    $filename = "S-".$service->id."-".time() . '-'.$a.'.' . $MimeType[1];
                    $path  = public_path('/uploads/services/' . $filename);
                    $uploaded_avatar = Image::make($photo)->resize(300, 300)->save( $path );
                    $service_image->path = '/uploads/services/'. $filename;
                    $service_image->save();
                    $a++;
                }
            }else {
                // echo "no p";
            }
            return redirect()->route('services.index');
        }
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
