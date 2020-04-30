<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }
}
