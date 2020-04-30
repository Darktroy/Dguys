<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http;

/**
 * Description of fcm
 *
 * @author root
 */
 class fcm {
    //put your code here
     
    public function fireBase($to,$data) {
        $apiKey = 'AAAA-CEi6no:APA91bEAZBbLKVcBbSyugIKv4BqhG49etAi0JzEbcWyvCD5XeouJ_vi85fHSH53CbTLyoq58VFQQFVKHApiirrg48UW29Eiw9MOxBpdlUny5XiUrR5yaU04FYVbFvjZ65qQPHnBoEhZH';
        //**************************************************************************************************************************
         $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token='diWhHpEdy1k:APA91bHfaE_zy4FUJ_GGDmO3XuJNz5qshyMeyjbIvvdLKI-DkR5rzhS00k9Hwc49yKzJLUraUPbu9-H-XOv8hbT-q-omtzXa8-uAv8Ewej52zO1gH0maKoGP4FLCu9FwVlLSpwBDC_3T';
$token = $apiKey;
        $notification = [
            'body' => 'this is test',
            'sound' => true,
        ];

        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
        /*dd($data);
            "dicount_code" => null
            "MoneyChanges_id" => null
            "delivery_price" => "10"
            "order_description" => "test 10"
            "device_id" => "iop[qs,fowkcpw;eckwpeolckpweokc"
            "estimated_price_by_client" => "100"
            "shop_name" => "shop name test"
            "shop_latitude" => "30.12345678"
            "shop_longitude" => "31.12345678"
            "drop_latitude" => "29.12345678"
            "drop_longitude" => "28.12345678"
            "shop_address" => "shope test address"
            "drop_address" => "drop address ttest"
            "user_id" => 25
            "OrderRequest_id" => 71
            "is_fixed_price" => 1
        */
        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $apiKey, //single token
            'notification' => $notification,
//            'data' => $extraNotificationData
            'data' => $data
                
        ];

        $headers = [
//            'Authorization: key=Legacy server key',
            'Authorization: key='.$token,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        //**************************************************************************************************************************
        /*
        $fields = array('to' =>$to,'notification'=>$data);
        $headers = array('Authorization: key='.$apiKey,'Content-Type: application/json');
        
        $ch = curl_init();
        $url = 'http://fcm.googleapis.com/fcm/send';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, \GuzzleHttp\json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        dd($result);
        */
        return json_decode($result,true);
    }
     
}
