<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nida extends Model
{
    use HasFactory;

    public function tra_accounts(){
        return $this->hasMany(TraAccount::class);
    }
}
