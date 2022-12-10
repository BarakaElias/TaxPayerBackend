<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;
use Illuminate\Support\Facades\Http;

use Validator;

class UserController extends Controller
{
    //
    const username = 'b1d2218977b5d109';
	const password = 'OTFmMWViOGQ4MDQ2YmRhN2U3YzVlZDlmZmU0NjE3MTEwYWMxZWY5MjI1YWEzYmY5NTQ3ZGFlZjRmNDllMzE0Yg==';
    function verify_nida(Request $req){
        $rules = array(
            "nida_no"=>"required|string|max:27",
        );
        $params = $req;

        // return $params;

        // $validator = Validator::make($params, $rules);
        // if($validator->fails()){
        //     return $validator->errors();
        // }

        $user = User::where('nida_no',$params['nida_no'])->first();
        if($user){
            $phone = $user->phone_number;
			$response = Http::withBasicAuth(UserController::username,UserController::password)->post('https://apiotp.beem.africa/v1/request',[
				"appId" => 206,
				"msisdn" => $phone
			]);

            if($response->status() == 200){
                return response([
                    "message"=>'success',
                ]);
            }else if($response->failed()){
                return $response;
            }else{
                return response([
                    "message"=>"error",
                ]);
            }
        }else{
            return $resonse;
        }
    }



    function verify_phone(Request $req){
        $rules = array([
            "code"=>"string|required",
        ]);
        $validator = Validator::make($params, $rules);
         if($validator->fails()){
             return $validator->errors();
         }

         $code = $req;
         $response = Http::withBasicAuth(UserController::username,UserController::password)->post('https://apiotp.beem.africa/v1/verify',[
            "pinId" => session('pinId'),
            "pin" => $code
        ]);
    }
}
