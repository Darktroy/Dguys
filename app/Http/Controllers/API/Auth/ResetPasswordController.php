<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PasswordResetRepository;
use App\Http\Requests\Auth\ResetPasswordFormRequest;
use App\Http\Requests\Auth\ForgetPasswordFormRequest;

class ResetPasswordController extends Controller
{
    /**
     * @var mixed
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, PasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    /**
     * @param ForgetPasswordFormRequest $request
     */
    public function __invoke(ResetPasswordFormRequest $request, User $user)
    {
        if ($this->passwordResetRepository->complete($user, $request->validated()['code'])) {
            $user->update($request->validted()['password']);

            return response()->json(['message' => 'password has been changed successfully']);
        }

        return response()->json(['message' => 'could not change your password']);

    }
}
