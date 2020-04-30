<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class CityListFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'language' => 'required|string|in:ar,en',
        ];
    }

    
}
