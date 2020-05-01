<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Complain;

use App\Repositories\ComplainRepository;

use App\Http\Requests\ComplainFormRequest;

class ComplainController extends Controller
{
    /**
     * @var mixed
     */
    
    public function __invoke(ComplainFormRequest $request, ComplainRepository $repo)
    {        
        $repo->addComplain($request);
        return response()->json(['data' => 'Success Sent', 'status' => 'success', 'code' => 200], 200);
    }
    
}
