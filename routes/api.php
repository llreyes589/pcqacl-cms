<?php

use App\Http\Controllers\Api\v1\BulletinController;
use App\Http\Controllers\Api\v1\OfficerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return 'test';
// });

Route::prefix('v1')->group(function(){
    // bulletin
    Route::get('/get-bulletin-items', [BulletinController::class, 'getBulletinItems']);
    Route::get('/get-bulletin-details/{uuid}', [BulletinController::class, 'getBulletinDetails']);
    
    // officers
    Route::get('/get-officers', [OfficerController::class, 'getOfficers']);
});