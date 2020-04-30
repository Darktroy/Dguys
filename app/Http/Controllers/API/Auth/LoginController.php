<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Auth\LoginUserFormRequest;

class LoginController extends Controller
{
    /**
     * @param LoginUserFormRequest $request
     */
    public function __invoke(LoginUserFormRequest $request)
    {
        if (auth()->attempt(Arr::only($request->validated(), ['password', 'mobile', ' type']))) {
            auth()->user()['device_id'] = $request->validated()['device_id'];
            auth()->user()->save();

            return (new UserResource(auth()->user()))->additional([
                'meta' => [
                    'token' => auth()->user()->generateAuthToken(),
                ],
            ]);
        }

        return response()->json(['error' => 'UnAuthorised'], 401);

    }
}
