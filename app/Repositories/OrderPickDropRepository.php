<?php

namespace App\Repositories;

use App\Models\OrderPickDrop;

class OrderPickDropRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(OrderPickDrop $model)
    {
        $this->model = $model;
    }
    
}
