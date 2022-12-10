<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrelaAccount;
use App\Models\Nida;

class TraAccount extends Model
{
    use HasFactory;

    function businesses(){
        return $this->hasMany(BrelaAccount::class);
    }

    function nida(){
        return $this->belongsTo(Nida::class,'nida_id','id');
    }
}
