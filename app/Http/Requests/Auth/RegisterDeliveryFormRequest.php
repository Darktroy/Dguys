<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

class RegisterDeliveryFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'mobile' => 'required|min:6|unique:users,mobile',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'nullable|min:6|email|unique:users,email',
            'code' => 'nullable|min:6|unique:invtations,code',
            'password' => 'required|min:6|max:32|confirmed',
            // password_confirmation
//            'profile_image' => 'nullable|min:6|image|mimes:jpeg,png,jpg,gif,svg',
            'profile_image' => 'nullable|min:6|image',
            'accept-terms' => 'required|in:1',
            //
            'model' => 'string|min:1|required',
            'plate_number' => 'string|required',
            'type' => 'string|min:1|required',
            //
            'latitude' => 'numeric|min:1|required',
            'longitude' => 'numeric|min:1|required',
            'address' => 'string|min:1|nullable',
            'city' => 'string|min:1|required',
            'is_citizen' => 'required|min:1|in:1,0',
            'national_card_serial' => 'string|min:1|required',
            'national_card_image' => 'nullable|image',
//            'national_card_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
//            'license_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'license_image' => 'nullable|image',
            //
            'bank_name' => 'string|min:1|required',
            'bank_account_serial' => 'string|required',
            'device_id' => 'string|required',
        ];}

    public function validated()
    {
        return array_merge(parent::validated(), [
            'password' => bcrypt($this->password),
            'type' => 'delivery_guy',
        ]);
    }
}
