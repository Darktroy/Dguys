<?php

namespace App\Repositories;

use App\Models\bank;

class BankRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(bank $model)
    {
        $this->model = $model;
    }
    
    public function listForApi($lang) {
        return $this->model->Select('id','bank_name_'.$lang.' AS bank_name')->get()->toArray();
    }
}
