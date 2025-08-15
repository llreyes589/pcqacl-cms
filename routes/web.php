<?php

use App\Http\Controllers\CMS\BulletinController;
use App\Http\Controllers\CMS\OfficerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('cms')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // bulletin
    Route::resource('bulletins', BulletinController::class);
    Route::put('bulletins/{id}/publish', [BulletinController::class, 'publish'])->name('bulletins.publish');
    
    // officers
    Route::resource('officers', OfficerController::class);

});
