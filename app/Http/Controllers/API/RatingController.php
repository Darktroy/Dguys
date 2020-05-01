<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Complain;

use App\Repositories\RatingRepository;

use App\Http\Requests\RateFormRequest;

class RatingController extends Controller
{
    /**
     * @var mixed
     */
    
    public function __invoke(RateFormRequest $request, RatingRepository $repo)
    {        
        $repo->addRating($request);
        return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
    }
    
}
