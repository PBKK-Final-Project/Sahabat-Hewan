<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth')->group(function () {
//     Route::post('/mychat/{dokter_id}', [ChatController::class, 'store']);
// });

// Route::post('/payment/{id}', [PaymentController::class, 'createPayment']);
Route::post('/payment/webhook/xendit', [PaymentController::class, 'webhook']);