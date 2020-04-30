<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->model = $users;
    }
}
