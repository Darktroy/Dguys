<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use App\Http\Requests\Auth\CityListFormRequest;
use Exception;

class CitiesController extends Controller
{
    protected  $city;
    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    /**
     * @param RegisterUserFormRequest $request
     */
    public function __invoke(CityListFormRequest $request)
    {
        try {
            $data = $this->city->listForApi($request->validated()['language']);
            return response()->json(['data' => $data, 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);
            

        }

    }

}
