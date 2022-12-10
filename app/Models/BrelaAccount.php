<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrelaAccount extends Model
{
    use HasFactory;


    public function tin(){
        return $this->belongsTo(TraAccount::class, 'tra_id','id');
    }
}
