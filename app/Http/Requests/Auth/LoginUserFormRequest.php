<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class LoginUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'password' => 'required',
            'mobile' => 'required',
            'device_id'=> 'required',
//            'type'=> 'required|in:client,delivery_guy',
        ];
    }
}
