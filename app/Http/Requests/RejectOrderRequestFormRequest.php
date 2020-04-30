<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class RejectOrderRequestFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'OrderRequest_id' => 'required|int|min:1|exists:order_requests,id|exists:driver_to_requests,OrderRequest_id'
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'rejector_id' =>auth()->user()->id,
            'type' =>auth()->user()->type,
        ]);
    }
}
