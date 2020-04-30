<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\RegisterUserFormRequest;
use DB;
use App\Services\LocalFileUploadService;

class RegisterController extends Controller
{
    /**
     * @var mixed
     */
    private $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param RegisterUserFormRequest $request
     */
    public function __invoke(RegisterUserFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->users->create(
                array_merge(
                    $request->validated(), [
                        'profile_image' => $request->hasFile('profile_image') ? $this->handleFileUpload($request->file('profile_image'))->getFileName() : null,
                    ]
                )
            );
            DB::commit();

            return response()->json(['token' => $user->generateAuthToken(), 
                'data' => $user, 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            
                return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);
            

        }

    }

    /**
     * @param $file
     */
    protected function handleFileUpload($file)
    {
        return (new LocalFileUploadService($file))->save(
            config('upload.images')
        );
    }
}
