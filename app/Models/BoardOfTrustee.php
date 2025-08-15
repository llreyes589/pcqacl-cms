<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardOfTrustee extends Model
{
    use HasFactory;

    protected $fillable = ['year_id','name','order','display_photo'];

    function year(){
        return $this->belongsTo(OfficerYear::class, 'year_id', 'id');
    }
}
