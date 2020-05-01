<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class ChangeOrderRequeststatusByDriverOrClientFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'OrderRequest_id' => 'required|int|min:1|exists:order_requests,id|exists:driver_to_requests,OrderRequest_id',
            'status' => 'required|int|min:1|in:starting,delivering,completed,buying,active|'
            . 'exists:order_states,status_id'
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'requester_id' =>auth()->user()->id,
            'requester_type' =>auth()->user()->type,
        ]);
    }
}
