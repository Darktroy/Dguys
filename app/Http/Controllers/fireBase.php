n <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 function fcm($to,$data) {
        $apiKey = '';
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
        return json_decode($result,true);
    }
    