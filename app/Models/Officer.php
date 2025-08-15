<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    function year(){
        return $this->belongsTo(OfficerYear::class, 'year_id', 'id');
    }
}
