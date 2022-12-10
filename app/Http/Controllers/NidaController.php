<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Nida;
use App\Models\TraAccount;
use App\Models\BrelaAccount;

class NidaController extends Controller
{
    //
    const username = 'b1d2218977b5d109';
	const password = 'OTFmMWViOGQ4MDQ2YmRhN2U3YzVlZDlmZmU0NjE3MTEwYWMxZWY5MjI1YWEzYmY5NTQ3ZGFlZjRmNDllMzE0Yg==';

    //fetches phone number with associated nida param and sends otp to it
    function verify_nida(Request $req){
        $rules = array(
            "nida_no"=>"required|string|max:27",
        );
        $params = $req->body;
        $nida_number = $req->get("nida_number");
        // dd($data);
        error_log($nida_number);
        $nida = Nida::where('nida_number',$nida_number)->first();
        error_log($nida);
        if($nida){
            $phone = $nida->phone_number;
            error_log($phone);
			$response = Http::withBasicAuth(UserController::username,UserController::password)->post('https://apiotp.beem.africa/v1/request',[
				"appId" => 206,
				"msisdn" => $phone
			]);

            error_log("After response");
            $bod = $response->json($key = null);
            $dat = $bod["data"];
            $pinId = $dat["pinId"];
            
            

            error_log($pinId);

            if($response->status() == 200){
                error_log("Success");
                error_log($response);
                error_log($nida->id);
                return ["pinId"=>$pinId,"nida_id"=>$nida->id];
            }else if($response->failed()){
                error_log("Failed");
                error_log($response);
                return $response;
            }else{
                error_log("Haieleweki");
                return response([
                    "message"=>"error",
                ]);
            }
        }else{
            error_log("Acha tu");
            return "No nida";
        }
    }


    function verify_phone(Request $req){
        
        $dat = $req->get("data");
        $code = $dat['code'];
        $pin = $dat['pinId'];
        error_log("getting data");
        error_log($pin);
        // $validator = Validator::make($params, $rules);
        //  if($validator->fails()){
        //      return $validator->errors();
        //  }

         $code = $req;
         $response = Http::withBasicAuth(UserController::username,UserController::password)->post('https://apiotp.beem.africa/v1/verify',[
            "pinId" => session('pinId'),
            "pin" => $code
        ]);

        if($response->status() == 200){
            return "ok";
        }

        return $response;
    }

    function get_info(Request $req){
        $data = $req->get('id');
        error_log("Nida id is:");
        error_log($data);

        $user = Nida::find($data);
        $tra_account = TraAccount::where("nida_id",$data)->first();
        $brela_account = BrelaAccount::where("tra_id",$tra_account->id)->first();
        error_log($brela_account);
        return ["user"=>$user,"tra_account"=>$tra_account,"brela_account"=>$brela_account];
    }
}
