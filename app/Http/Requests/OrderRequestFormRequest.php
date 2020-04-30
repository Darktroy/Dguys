<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\APIRequest;



class OrderRequestFormRequest extends APIRequest
{
     public function rules()
    {
        return [
            'dicount_code' => 'nullable|string|min:4|exists:discount_codes,dicount_code',
            'MoneyChanges_id' => 'nullable|int|min:1|exists:money_changes,id',
            'delivery_price' => 'required|string|min:2',
            'order_description' => 'required|min:6|string',
            'device_id' => 'required|min:6|string',
            //
            'estimated_price_by_client' => 'numeric|min:1|required',
            'shop_name' => 'string|required',
            'shop_latitude' => 'numeric|min:1|required',
            //
            'shop_longitude' => 'numeric|min:1|required',
            'drop_latitude' => 'numeric|min:1|required',
            'drop_longitude' => 'numeric|min:1|required',
            'shop_address' => 'string|min:1|nullable',
            'drop_address' => 'string|min:1|nullable'
        ];
        
    }

    public function validated()
    {
        return array_merge(parent::validated(), [
            'user_id' =>auth()->user()->id,
        ]);
    }
}
