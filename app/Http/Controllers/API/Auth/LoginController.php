<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserFormRequest;

class LoginController extends Controller
{
    /**
     * @param LoginUserFormRequest $request
     */
    public function __invoke(LoginUserFormRequest $request)
    {
        $credantial = ['password'=>$request->validated()['password']
                ,'mobile'=>$request->validated()['mobile']
                ,'type'=>$request->validated()['type']];
//        if (auth()->attempt($request->validated())) {
        if (auth()->attempt($credantial) ){
           auth()->user()['device_id'] = $request->validated()['device_id'];
           auth()->user()->save();
            return response()->json(['token' => auth()->user()->generateAuthToken()]);
        }

        return response()->json(['error' => 'UnAuthorised'], 401);

    }
}
