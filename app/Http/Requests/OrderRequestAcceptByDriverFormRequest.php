<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class OrderRequestAcceptByDriverFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'OrderRequest_id' => 'required|int|min:1|exists:order_requests,id|exists:driver_to_requests,OrderRequest_id',
            'delivery_price_by_driver' => 'nullable|int|min:1'
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'driver_id' =>auth()->user()->id,
        ]);
    }
}
