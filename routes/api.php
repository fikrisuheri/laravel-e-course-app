<?php

use App\Http\Controllers\Api\MidtransController;
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


Route::post('payment/midtrans-notification', [MidtransController::class, 'receive']);
Route::post('payment/midtrans-success', [MidtransController::class, 'success']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
