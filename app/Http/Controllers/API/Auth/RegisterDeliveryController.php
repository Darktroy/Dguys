<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\BankAccountRepository;
use App\Repositories\DeliveryGuyDetailRepository;
use App\Http\Requests\Auth\RegisterDeliveryFormRequest;
use App\Services\LocalFileUploadService;
use DB;

class RegisterDeliveryController extends Controller
{
    /**
     * @var mixed
     */
    private $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users, VehicleRepository $vehicles, BankAccountRepository $bankAccounts, DeliveryGuyDetailRepository $deliveryGuys)
    {
        $this->users = $users;
        $this->vehicles = $vehicles;
        $this->bankAccounts = $bankAccounts;
        $this->deliveryGuys = $deliveryGuys;
    }

    /**
     * @param RegisterDeliveryFormRequest $request
     */
    public function __invoke(RegisterDeliveryFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if ($request->hasFile('profile_image')) {
                $data['profile_image'] = $this->handleFileUpload($request->profile_image, config('upload.images'))->getFileName();
            }
            // fillable.
            $user = $this->users->create($data);
            $token = $user->generateAuthToken();
            $data = array_merge($data, [
                'user_id' => $user->id,
            ]);

            $this->vehicles->create($data);

            if ($request->hasFile('national_card_image')) {
                $data['national_card_image'] = $this->handleFileUpload($request->national_card_image, config('upload.national_card_image'))->getFileName();

            }
            if ($request->hasFile('license_image')) {
                $data['license_image'] = $this->handleFileUpload($request->license_image, config('upload.license_image'))->getFileName();
            }
            $this->bankAccounts->create($data);

            $this->deliveryGuys->create($data);
            DB::commit();

            return response()->json(['token' => $token, 'data' => $user, 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }

    /**
     * @param $file
     */
    protected function handleFileUpload($file, $path)
    {
        return (new LocalFileUploadService($file))->save(
            $path
        );
    }
}
