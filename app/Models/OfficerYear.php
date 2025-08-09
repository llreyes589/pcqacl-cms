<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficerYear extends Model
{
    use HasFactory;

    function officers(){
        return $this->hasMany(Officer::class, 'year_id', 'id');
    }
    function bot(){
        return $this->hasMany(BoardOfTrustee::class, 'year_id', 'id');
    }


}
