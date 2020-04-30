<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiRequest;

class clientCreation extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
          return [
           'mobile' => 'required|min:6|unique:users,mobile',
           'email' => 'nullable|min:6|email|unique:users,email',
           'code' => 'nullable|min:6|unique:invtations,code',
            'password' => 'required|min:6|required_with:c_password|same:c_password',
            'c_password' => 'required|min:6',
            'profile_image' => 'nullable|min:6|image|mimes:jpeg,png,jpg,gif,svg',
           'accept-terms'=>'required|in:1'
        ];
            
    }

    public function messages()
    {
        return [
            'title.unique' => 'title must be a unique.',
            'description.min'  => 'description minimum length bla bla bla'
        ];
    }
}
