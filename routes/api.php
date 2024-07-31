<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/transaction', [TransactionController::class, 'index']);
Route::post('/wallet', [WalletController::class, 'index']);
Route::post('/wallet/deposit', [WalletController::class, 'deposit']);
Route::post('/wallet/withdrawal', [WalletController::class, 'withdrawal']);
Route::post('/wallet/purchase', [WalletController::class, 'purchase']);