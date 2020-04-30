<?php

namespace App\Repositories;

use App\Models\DriverLocation;
use App\Models\DriverToRequest;
use Illuminate\Support\Facades\DB;
use App\Http\fcm;

class DriverLocationRepository extends Repository {

    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(DriverLocation $model) {
        $this->model = $model;
    }

    public function findNearestDriverAndSendFirstrequest($data) {
        $data['is_fixed_price'] = 1;
        $driver_to_request = new DriverToRequestRepository(new DriverToRequest());
        $nearest_driver_to_the_shop = $this->model->select(DB::raw('*, ( 6371 * acos( cos( radians(' .
                                $data['shop_latitude'] . ') ) * cos( radians( latitude ) ) * cos(radians( longitude ) - radians(' .
                                $data['shop_longitude'] . ') ) + sin( radians(' . $data['shop_latitude'] .
                                ') ) * sin( radians( latitude ) ) ) ) as distance'))->where('status', 'on')->having('distance', '<=', 200)->orderBy('distance')->get()->toArray();
        $fcm = new fcm();
        $devices_ids = [];
        foreach ($nearest_driver_to_the_shop as $key => $value) {
            if ($key == 0) {
                $to = $value['device_id'];
                $result = $fcm->fireBase($to, $data);
                $value['status'] ='waiting_driver';
                $temp = array_merge($value, ['OrderRequest_id' => $data['OrderRequest_id']]);
                $driver_to_request->create($temp);
            }
                $value['status'] ='in_queu';
                $driver_to_request->create(array_merge($value, ['OrderRequest_id' => $data['OrderRequest_id']]));
            
            $devices_ids[] = $value['device_id'];
        }
//        dd($nearest_driver_to_the_shop);
    }

//    public function orderRequestSendingByClient($data) {
//        $orderReq = $this->model->create($data);
//        
//    }
}
