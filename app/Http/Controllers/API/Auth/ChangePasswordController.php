<?php

namespace App\Http\Controllers\API\Auth;

use Hash;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\ChangePasswordFormRequest;

class ChangePasswordController extends Controller
{
    /**
     * @var mixed
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ChangePasswordFormRequest $request
     */
    public function __invoke(ChangePasswordFormRequest $request)
    {
        if (Hash::check($request->validated()['old_password'], auth()->user()->password)) {
            auth()->user()->update([
                'password' => $request->validated()['password'],
            ]);

            return response()->json(['message' => 'password has been changed successfully', 'status' => 'success', 'code' => 200]);
        }

        return response()->json(['message' => 'Invalid password provided.']);
    }
}
