<?php

namespace App\Repositories;

use App\Models\city;

class CityRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(city $model)
    {
        $this->model = $model;
    }
    
    public function listForApi($lang) {
        return $this->model->Select('id','city_name_'.$lang.' AS city_name')->get()->toArray();
    }
}
