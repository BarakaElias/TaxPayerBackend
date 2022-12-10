<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TraAccount;

class TraController extends Controller
{
    //get a tra account
    function get_details(Request $req){
        $nida = $req->body->nida;
        $tra_results = TraAccount::where('nida_number',$nida);
        return $tra_results;
    }
}
