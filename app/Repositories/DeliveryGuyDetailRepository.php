<?php

namespace App\Repositories;

use App\Models\DeliveryGuyDetail;

class DeliveryGuyDetailRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param DeliveryGuyDetail $model
     */
    public function __construct(DeliveryGuyDetail $model)
    {
        $this->model = $model;
    }
}
