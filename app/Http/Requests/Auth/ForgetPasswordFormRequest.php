<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class ForgetPasswordFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'mobile' => 'required|exists:users,mobile',
//            'code' => 'nullable|min:6|unique:invtations,code',
            'code' => 'nullable|min:4|in:aaaa',
            'password' => 'required|min:6|max:32|confirmed',
        ];
    }
    public function validated()
    {
        return array_merge(parent::validated(), [
            'password' => bcrypt($this->password),
            'password_clear' => $this->password,
        ]);
    }
}
