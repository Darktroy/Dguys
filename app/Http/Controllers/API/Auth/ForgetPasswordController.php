<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PasswordResetRepository;
use App\Http\Requests\Auth\ForgetPasswordFormRequest;

class ForgetPasswordController extends Controller
{
    /**
     * @var mixed
     */
    protected $userRepository;

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
    public function __invoke(ForgetPasswordFormRequest $request)
    {
        $user = $this->userRepository->where('mobile',$request->validated()['mobile'])->firstOrFail();
        
        //TODO: Event SEND SMS.
        $user->update([
                'password' => $request->validated()['password'],
            ]);
        $data =[];
        $data['mobile'] =$request->validated()['mobile'];
        $data['password'] =$request->validated()['password_clear'];
        
        
//            dd(auth()->user()->generateAuthToken());
          if (auth()->attempt($data)) {
            return response()->json(['token' => auth()->user()->generateAuthToken(),"status"=> "success",
    "code"=>200],200);
        }

        return response()->json(['error' => 'UnAuthorised',"status"=> "faild",
    "code"=>401], 200);


    }
}
