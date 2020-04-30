<?php

namespace App\Repositories;

use App\Models\OrderRequest;
use App\Models\DiscountCode;
use App\Models\MoneyChanges;
use App\Models\OrderPickDrop;
use App\Models\DriverLocation;
use App\Models\User;
use App\Models\DriverToRequest;
use App\Repositories\UserRepository;

class OrderRequestRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;
    protected $discountCodeObj;
    protected $moneyChangesObj;
    protected $orderPickDropObj;
    protected $driverToRequesObj;

    /**
     * @param Vehicle $model
     */
    public function __construct(OrderRequest $model)
    {
        $this->model = $model;
        
    }
    
    public function orderRequestSendingByClient($data) {
        $orderReq = $this->model->create($data);
        $this->orderPickDropObj = new OrderPickDropRepository(new OrderPickDrop());
        $this->orderPickDropObj->create(array_merge($data, ['OrderRequest_id'=>$orderReq['id']]));
        $this->client = new UserRepository(new User());
        $this->client->where('id',$data['user_id'])->update(array('device_id'=>$data['device_id']));
        $data['OrderRequest_id'] = $orderReq['id'];
        
        $driver_location_obj = new DriverLocationRepository(new DriverLocation());
        $driver_location_obj->findNearestDriverAndSendFirstrequest($data);
        return $data;
        #calling for searching of drivers goes here saving it to the driver to request 
        
    }
    
}
