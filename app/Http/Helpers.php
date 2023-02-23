<?php

function price_format ($price,$service){
    $provider = \App\Service::find($service)->User;
    $configuration_id = 7; //currency Config id

    if ($provider->Settings->where('configuration_id',$configuration_id)->first()){
        $currency = $provider->Settings->where('configuration_id',1)->first()->value;
       return $price . " ".$currency;
    }else{
        $currency = \App\Configuration::find($configuration_id)->value;
            return $price." ".$currency ;

    }
}
function price_format_front ($price,\App\User $provider){

    $configuration_id = 1; //currency Config id

    if ($provider->Settings->where('configuration_id',$configuration_id)->first()){
        $currency = $provider->Settings->where('configuration_id',1)->first()->value;
       return $price . " ".$currency;
    }else{
        $currency = \App\Configuration::find($configuration_id)->value;
            return $price." ".$currency ;

    }
}
function getPrices( $models){

    if($models->count() != 0){
     $services = array();
                      foreach ($models as $model){
                          foreach ($model->Services as $service ){
                            array_push($services,$service->price);
                          }
                        }
                      return $services;
    }else{
        return array(0,0);
    }
}

/**
 * @param $service_id
 * @param $date
 * @return mixed
 */
function timeAvailability($service_id, $date)
{
    $serviceBookingsOfBookable = \App\Service::find($service_id)->bookings->where('starts_at',$date)->count();
    return $serviceBookingsOfBookable;
}

 ?>
