<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\clientCreation;
use \App\Http\Requests\deliveryGuyCreation;
use \Illuminate\Support\Facades\DB;
use App\Models\deliveryGuyDetails;
use App\Models\bankAccountDetails;
use App\Models\vehicleDetails;
use App\Repositories\Repository;
use Exception;

class PassportController extends Controller
{
     public function registerClient(clientCreation $request)
    {
         
        try {
            DB::beginTransaction();

             $user = User::create([
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
             if(is_file($request->profile_image)){
                 $imageName = time().$user['id'].'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path('images'), $imageName);
             }
             $user->profile_image = $imageName;
             $user->save();
             
              
                $token = $user->createToken('IessaSaysHi')->accessToken;
                DB::commit();

                return response()->json(['token' => $token,'data'=>$user,'status'=>'success','code'=>200], 200);
        } catch(Exception $e)
        { 
            DB::rollBack();
            $test = @unserialize($e->getMessage());
            if ($test !== false) {
                $datra = unserialize($e->getMessage());
                            return response()->json(['error' => $datra , 'status'=>'faild','code'=>400], 200);

            } else {
                return response()->json(['error' => $e->getMessage() , 'status'=>'faild','code'=>400], 200);
            }
            
        } 
       
    }
 
    
     public function registerDeliveryGuy(deliveryGuyCreation $requestrow)
    {
        $vehicleDetails = new Repository(new vehicleDetails());

        try {
            DB::beginTransaction();
            $request = $requestrow->validated();
            $user = User::create([
                    'mobile' => $request['mobile'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                ]);
            
            $request['user_id']=$user['id'];
            if(is_file($request['profile_image'])){
                $imageName = time().$user['id'].'.'.$request['profile_image']->getClientOriginalExtension();
                $request['profile_image']->move(public_path('images'), $imageName);
            }
            $user->profile_image = $imageName;
            $user->save();
            $token = $user->createToken('IessaSaysHi')->accessToken;
//            $vechile = vehicleDetails::create($request); 
            $vechile = $vehicleDetails->create($request); 
            $bankaccount = bankAccountDetails::create($request); 
             if(is_file($request['profile_image'])){
                $imageName = time().$user['id'].'.'.$request['profile_image']->getClientOriginalExtension();
                $request['profile_image']->move(public_path('images'), $imageName);
            }
            if(is_file($request['national_card_image'])){
                $national_card_image = 'national_card_image'.time().$user['id'].'.'.$request['national_card_image']->getClientOriginalExtension();
                $request['national_card_image']->move(public_path('nationalCardImage'), $national_card_image);
                $request['national_card_image'] = $national_card_image;
            }
            if(is_file($request['license_image'])){
                $license_image = 'license_image'.time().$user['id'].'.'.$request['license_image']->getClientOriginalExtension();
                $request['license_image']->move(public_path('licenseImage'), $license_image);
                $request['license_image'] = $license_image;
            }
            $deliveryGuyDetails = deliveryGuyDetails::create($request);
                DB::commit();
            return response()->json(['token' => $token,'data'=>$user,'status'=>'success','code'=>200], 200);
        } catch(Exception $e)
        { 
            DB::rollBack();
            $test = @unserialize($e->getMessage());
            if ($test !== false) {
                $datra = unserialize($e->getMessage());
                            return response()->json(['error' => $datra , 'status'=>'faild','code'=>400], 200);

            } else {
                return response()->json(['error' => $e->getMessage() , 'status'=>'faild','code'=>400], 200);
            }
            
        } 
       
    }
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
