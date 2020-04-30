<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use App\Models\DriverToRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Repositories\OrderRequestRepository;
use App\Http\Requests\OrderRequestFormRequest;
use App\Repositories\DriverToRequestRepository;
use App\Http\Requests\RejectOrderRequestFormRequest;
use App\Http\Requests\ListAllOrderRequestFormRequest;
use App\Http\Requests\OrderRequestAcceptByDriverFormRequest;
use App\Http\Requests\DriverRequestAcceptByCkientFormRequest;

class OrderRequestController extends Controller
{
    /**
     * @var mixed
     */
    private $orderRequestRepository;

    /**
     * @param OrderRequestRepository $orderRequestRepository
     */
    public function __construct(OrderRequestRepository $orderRequestRepository)
    {
        $this->orderRequestRepository = $orderRequestRepository;
    }

    /**
     * @param OrderRequestAcceptByDriverFormRequest $request
     */
    public function acceptOrderRequest(OrderRequestAcceptByDriverFormRequest $request)
    {
        $modleObj =
        new DriverToRequestRepository(new DriverToRequest());
        try {
            DB::beginTransaction();
            $data = $modleObj->accpetRequestByDriver($request->validated());

            DB::commit();

            return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }

    /**
     * @param DriverRequestAcceptByCkientFormRequest $request
     */
    public function clientAcceptDriverRequest(DriverRequestAcceptByCkientFormRequest $request, DriverToRequestRepository $driverToRequestRepository)
    {
        try {
            DB::beginTransaction();
            $data = $driverToRequestRepository->accpetRequestByClient($request->validated());

            DB::commit();

            return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }

    /**
     * @param ListAllOrderRequestFormRequest $request
     */
    public function listOrderRequest(ListAllOrderRequestFormRequest $request, DriverToRequestRepository $driverToRequestRepository)
    {
        return OrderResource::collection(
            $driverToRequestRepository->listOrderRequest(
                $request->validated()
            )
        );
    }

    /**
     * @param OrderRequestFormRequest $request
     */
    public function orderRequest(OrderRequestFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $this->orderRequestRepository->orderRequestSendingByClient($request->validated());

            DB::commit();

            return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }

    /**
     * @param RejectOrderRequestFormRequest $request
     */
    public function rejectOrderRequest(RejectOrderRequestFormRequest $request, DriverToRequestRepository $driverToRequestRepository)
    {
        try {
            DB::beginTransaction();
            $data = $driverToRequestRepository->rejectOrderRequest($request->validated());

            DB::commit();

            return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage(), 'status' => 'faild', 'code' => 400], 200);

        }
    }
}
