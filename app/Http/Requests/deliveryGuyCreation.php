<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiRequest;


class deliveryGuyCreation extends ApiRequest
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
            'mobile' => 'required|min:6|unique:users,mobile',
            'first_name' => 'required|string|min:6',
            'last_name' => 'required|string|min:6',
           'email' => 'nullable|min:6|email|unique:users,email',
           'code' => 'nullable|min:6|unique:invtations,code',
            'password' => 'required|min:6|required_with:c_password|same:c_password',
            'c_password' => 'required|min:6',
            'profile_image' => 'nullable|min:6|image|mimes:jpeg,png,jpg,gif,svg',
           'accept-terms'=>'required|in:1',
            //
            'model' => 'string|min:1|required',
            'plate_number' => 'string|required',
            'type' => 'string|min:1|required', 
            //
            'latitude' => 'numeric|min:1|required',
            'longitude' => 'numeric|min:1|required',
            'address' => 'string|min:1|nullable',
            'city' => 'string|min:1|required',
            'is_citizen' => 'boolean|required',
            'national_card_serial' => 'string|min:1|required',
            'national_card_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'license_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
            //
            'bank_name' => 'string|min:1|required',
            'bank_account_serial' => 'string|required',
        ];
    }
}
