<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\API;
use App\Repositories\DriverLocationRepository;
use \App\Models\DriverLocation;
/**
 * Description of ApiHelper
 *
 * @author root
 */
class ApiHelper {
    //put your code here
    
    public function find_driver($data) {
        /* "dicount_code" => null
  "MoneyChanges_id" => null
  "delivery_price" => "10"
  "order_description" => ""test test test test 10
    """
  "device_id" => "iop[qs,fowkcpw;eckwpeolckpweokc"
  "estimated_price_by_client" => "100"
  "shop_name" => "shop name test"
  "shop_latitude" => "30.12345678"
  "shop_longitude" => "31.12345678"
  "drop_latitude" => "29.12345678"
  "drop_longitude" => "28.12345678"
  "shop_address" => "shope test address"
  "drop_address" => "drop address ttest"
         * 
  "OrderRequest_id" => 46
  "user_id" => 25
        dd($data);*/
        $nearest_driver_to_the_shop = DriverLocationRepository::select(DB::raw('*, ( 6371 * acos( cos( radians(' .
                                $data['shop_latitude'] . ') ) * cos( radians( latitude ) ) * cos(radians( longitude ) - radians(' .
                                $data['shop_longitude'] . ') ) + sin( radians(' . $data['shop_latitude'] .
                                ') ) * sin( radians( latitude ) ) ) ) as distance'))->where('status', 'on')->get()->toArray();
        dd($nearest_driver_to_the_shop);
        
    }
    
    
    public function GetDrivingDistance($lat1, $lat2, $long1, $long2) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=pl-PL&key=" . MAP_KEY;

        $geocode = file_get_contents($url);
        $response_a = json_decode($geocode);
        if ($response_a->status == "REQUEST_DENIED" || $response_a->status == "OVER_QUERY_LIMIT") {
            return array('status' => "fail", 'msg' => $response_a->error_message, 'time' => '0', 'distance' => "0");
        } elseif ($response_a->rows[0]->elements[0]->status == "ZERO_RESULTS") {
            return array('status' => "fail", 'msg' => 'can not find route', 'time' => '0', 'distance' => "0");
        } elseif ($response_a->status == "OK") {
            $dist_find = $response_a->rows[0]->elements[0]->distance->value;
            $time_find = $response_a->rows[0]->elements[0]->duration->value;

            $dist = $dist_find != '' ? $dist_find : '';
            $time = $time_find != '' ? $time_find : '';
            return array('status' => 'success', 'distance' => $dist, 'time' => (int) $time);
        } else {
            return array('status' => 'success', 'distance' => "1", 'time' => "1");
        }
    }
    
    
}
