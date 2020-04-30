<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Exception;
use App\Http\Requests\Auth\BankListFormRequest;
use App\Repositories\BankRepository;
class BanksController extends Controller
{

    protected  $bank;
    public function __construct(BankRepository $bank)
    {
        $this->bank = $bank;
    }

    /**
     * @param RegisterUserFormRequest $request
     */
    public function __invoke(BankListFormRequest $request)
    {
        try {
            $data = $this->bank->listForApi($request->validated()['language']);
            return response()->json(['data' => $data, 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);
            

        }

    }

}
