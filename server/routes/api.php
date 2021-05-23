<?php

use App\Http\Controllers\AccountController;

use App\Http\Controllers\TransactionController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');

Route::get('/account/{id}', [AccountController::class, 'show'])->name('account.show');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
