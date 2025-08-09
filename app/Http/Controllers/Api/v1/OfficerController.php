<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\OfficerYear;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    function getOfficers(){
        $officer_year = OfficerYear::with('officers')->where('is_published', 1)->first();
        return response()->json(['status_code' => 200, "message" => 'Successfully processed.', 'data' => $officer_year]);
    }
}
