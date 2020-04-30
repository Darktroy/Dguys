<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class DriverStatusandLoctionFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'device_id' => 'nullable|string|min:4',
            'status' => 'required|string|min:2|in:on,off',
            'longitude' => 'numeric|min:1|required',
            'latitude' => 'numeric|min:1|required',
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'driver_id' =>auth()->user()->id,
        ]);
    }
}
