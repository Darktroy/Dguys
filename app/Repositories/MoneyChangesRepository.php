<?php

namespace App\Repositories;

use App\Models\MoneyChanges;

class MoneyChangesRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(MoneyChanges $model)
    {
        $this->model = $model;
    }
    
}
