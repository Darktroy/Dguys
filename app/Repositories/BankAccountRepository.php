<?php

namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Vehicle $model
     */
    public function __construct(BankAccount $model)
    {
        $this->model = $model;
    }
}
