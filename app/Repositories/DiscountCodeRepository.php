<?php

namespace App\Repositories;

use App\Models\DiscountCode;

class DiscountCodeRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(DiscountCode $model)
    {
        $this->model = $model;
    }
    
}
