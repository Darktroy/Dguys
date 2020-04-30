<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class ChangePasswordFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'old_password' => 'required|string|min:3|max:32',
            'password' => 'required|string|min:3|max:32|confirmed',
        ];
    }

    public function validated()
    {
//        dd(parent::validated()['password']);
        return array_merge(parent::validated(), [
            'password' => bcrypt($this->password),
        ]);
    }
}
