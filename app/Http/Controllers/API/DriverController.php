<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\DriverLocation;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverStatusandLoctionFormRequest;
use App\Repositories\DriverLocationRepository;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function updateLocation(DriverStatusandLoctionFormRequest $request) {
        $modleObj = 
                new DriverLocationRepository(new DriverLocation());
        try {
            DB::beginTransaction();
            $modleObj->create($request->validated());
            DB::commit();
            return response()->json([ 'data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }
}
