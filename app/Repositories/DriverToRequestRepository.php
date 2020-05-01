<?php

namespace App\Repositories;

use App\Http\fcm;
use App\Models\DriverToRequest;

class DriverToRequestRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(DriverToRequest $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     */
    public function accpetRequestByClient($data)
    {
        $fcm = new fcm();
        $driver_to_request = $this->model
//                    ->where('driver_id',$data['driver_id'])
            ->where('OrderRequest_id', $data['OrderRequest_id'])
            ->where('status', 'waiting_client')
            ->with('theorder.user', 'driverdetails')->firstOrFail();
        $driver_to_request->update(['status' => 'accept_by_client']);
        /*
        //    dd($driver_to_request['driverdetails']['device_id']);
        //    dd($driver_to_request['theorder']['user']['device_id']); //client
        #here as change by
         */
        $fcm->fireBase($driver_to_request['driverdetails']['device_id'], array('message' => 'Accepted '
            , 'OrderRequest_id' => $data['OrderRequest_id']));
        \App\Models\OrderRequest::where('id', $data['OrderRequest_id'])->update(['status' => 'active',
            'driver_id'=>$driver_to_request['driver_id']]);

    }

    /**
     * @param $data
     */
    public function accpetRequestByDriver($data)
    {
        $fcm = new fcm();
        $driver_to_request = $this->model->where('driver_id', $data['driver_id'])
            ->where('OrderRequest_id', $data['OrderRequest_id'])
            ->where('status', 'waiting_driver')->with('theorder.user', 'driverdetails')->firstOrFail();
        $driver_to_request->update(['status' => 'waiting_client']);
        /*
        //    dd($driver_to_request['driverdetails']['device_id']);
        //    dd($driver_to_request['theorder']['user']['device_id']); //client
        #here as change by
         */
        $isfixedprice = 1;
        if ($isfixedprice === 1) {
            $fcm->fireBase($driver_to_request['theorder']['user']['device_id'], array('message' => ' Driver accept lets begain okay ? '
                , 'OrderRequest_id' => $data['OrderRequest_id'], 'Delivery_cost' => $driver_to_request['theorder']['delivery_price']));
        } else {
            $fcm->fireBase($driver_to_request['theorder']['user']['device_id'], array('message' => ' Driver accept lets begain okay ? '
                , 'OrderRequest_id' => $data['OrderRequest_id'], 'Delivery_cost' => $driver_to_request['delivery_price_by_driver']));
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function listOrderRequest($data)
    {
        $requests = null;
        if ($data['type'] === 'client') {
            $otterModel = new \App\Models\OrderRequest();
            $requests = $otterModel->where('user_id', $data['requestor_id'])->with('statusRelation')
                ->get();
        } else {
            $requests = $this->model->where('driver_id', $data['requestor_id'])->with('theorder.statusRelation')
                ->get()->pluck('theorder');
        }

        return $requests;
    }

    public function listOneRequest($data) {
        $requests = null;
        if ($data['type'] === 'client') {
            $otterModel = new \App\Models\OrderRequest();
            $requests = $otterModel->where('user_id', $data['requestor_id'])
                    ->where('OrderRequest_id', $data['OrderRequest_id'])
                    ->with('statusRelation','theorder.OrderPickDropRel')
                ->get();
        } else {
            $requests = $this->model->where('driver_id', $data['requestor_id'])
                    ->where('OrderRequest_id', $data['OrderRequest_id'])
                    ->whereIn('status',['accept_by_client'
//                        ,'accept_by_driver','cancel_by_client','cancel_by_driver','waiting_driver','waiting_client'
                        ])
                    ->with('theorder.statusRelation','theorder.OrderPickDropRel')
                ->get()->pluck('theorder');
//dd($data['requestor_id']);
        }
        return $requests;
    }
    
    /**
     * @param $data
     */
    public function rejectOrderRequest($data)
    {
        if ($dat['type'] === 'client') {
            $driver_to_request = $this->model
                ->where('OrderRequest_id', $data['OrderRequest_id'])->where('status', 'waiting_client')->firstOrFail();
            $driver_to_request->update(['status' => 'cancel_by_client']);
        } else {
            $driver_to_request = $this->model
                ->where('driver_id', $data['rejector_id'])->where('OrderRequest_id', $data['OrderRequest_id'])->firstOrFail();
            $driver_to_request->update(['status' => 'cancel_by_driver']);
        }
        $this->resendRequestForAnotherDriver($data);
    }

    /**
     * @param $data
     */
    public function resendRequestForAnotherDriver($data)
    {
        $driver_to_request = $this->model->where('OrderRequest_id', $data['OrderRequest_id'])->where('status', 'in_queu')
            ->with('theorder.user', 'driverdetails')
            ->firstOrFail();

        $fcm = new fcm();
        $to = $driver_to_request['driverdetails']['device_id'];
        $data_to_notify = $driver_to_request['theorder'];
        $result = $fcm->fireBase($to, $data);
        $driver_to_request->update(['status' => 'waiting_driver']);
    }
    
    
    public function changeRequestStatusByDriverOrClient($data)
    {
        $otterModel = new \App\Models\OrderRequest();
        if($data['']=='client' && $data['status'] == 'completed'){
            $requests = $otterModel->where('id', $data['OrderRequest_id'])
                    ->where('user_id', $data['requester_id'])->update(['status'=>$data['status']]);
        }else{
            //here driver will change
            if($data['status'] !='completed'){
                // To distinct between the driver complete trip and the client once 
                    $this->model->where('driver_id', $data['driver_id'])
                    ->where('OrderRequest_id', $data['OrderRequest_id'])->update(['status'=>$data['status']]);
            }else{
                $requests = $otterModel->where('id', $data['OrderRequest_id'])
                    ->where('driver_id', $data['requester_id'])->update(['status'=>$data['status']]);
            }
        }
    }
}
