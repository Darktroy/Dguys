<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class ResetPasswordFormRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6|max:32|confirmed',
            'code' => 'required',
        ];
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'password' => bcrypt($this->password),
        ]);
    }
}
