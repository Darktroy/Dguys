<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class RegisterUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'password' => 'required',
            'device_id' => 'required',
            'mobile' => 'required|unique:users,mobile',
        ];
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'password' => bcrypt($this->password),
        ]);
    }
}
