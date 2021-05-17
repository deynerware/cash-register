<?php

use App\Http\Controllers\CashController;
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

Route::post('cash', [CashController::class, 'store']);
Route::get('cash', [CashController::class, 'index']);

Route::get('cash/all', [CashController::class, 'getAllCash']);
Route::get('cash/empty', [CashController::class, 'emptyCash']);

Route::post('payment', [CashController::class, 'payment']);
