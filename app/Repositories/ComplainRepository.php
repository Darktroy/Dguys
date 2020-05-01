<?php

namespace App\Repositories;

use App\Http\fcm;
use App\Models\Complain;

class ComplainRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(Complain $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     */
    public function addComplain($data)
    {
        $isExist = null;
        if($data['complain_by_user_type']=='client'){
            $isExist = \App\Models\OrderRequest::where('user_id',$data['user_id'])
                    ->where('id',$data['OrderRequest_id'])->firstorfail();
        }else{
            $isExist = \App\Models\OrderRequest::where('driver_id',$data['user_id'])
                    ->where('id',$data['OrderRequest_id'])->firstorfail();
        }
        $this->model->create($data);
    }

}
