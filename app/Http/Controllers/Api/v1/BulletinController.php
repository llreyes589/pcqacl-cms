<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    function getBulletinItems(Request $request){
        $bulletinItems = Bulletin::where('is_active', 1)->limit($request->limit)->get();
        return response()->json(['status_code' => 200, "message" => 'Successfully processed.', 'data' => $bulletinItems]);
    }
    function getBulletinDetails($uuid){
        $bulletin = Bulletin::where('uuid', $uuid)->where('is_active', 1)->first();
        return response()->json(['status_code' => 200, "message" => 'Successfully processed.', 'data' => $bulletin]);
    }
}
