<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class RateFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'OrderRequest_id' => 'required|int|min:1|exists:order_requests,id|exists:driver_to_requests,OrderRequest_id',
            'rate' => 'required|int|min:1'
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'user_id' =>auth()->user()->id,
            'rate_by_user_type' =>auth()->user()->type,
        ]);
    }

    

}
