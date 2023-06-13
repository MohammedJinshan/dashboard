<?php

use App\Http\Controllers\OtpApiController;
use App\Http\Controllers\SignupApiController;
use App\Http\Controllers\StoreApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/get-otp', [OtpApiController::class, 'getopt']);
Route::post('/confirm-otp', [OtpApiController::class, 'confrmotp']);

Route::post('/signup', [SignupApiController::class, 'signup']);

Route::post('/all-stores', [StoreApiController::class, 'allstores']);



