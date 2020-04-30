<?php

namespace App\Repositories;

use App\Traits\IssueTokens;
use App\Models\PasswordReset;

class PasswordResetRepository extends Repository
{
    use IssueTokens;

    /**
     * @var mixed
     */
    protected $model;

    /**
     * @var string
     */
    protected $process = 'passwordReset';

    /**
     * @param PasswordReset $model
     */
    public function __construct(PasswordReset $model)
    {
        $this->model = $model;
    }
}
