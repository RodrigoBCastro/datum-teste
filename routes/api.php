<?php

use App\Hash\Http\Controllers\HashController;
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

Route::middleware(['throttle:ip_address'])->group(function () {
    Route::prefix('hash')->group(function() {
        Route::post('generate', [HashController::class, 'generate'])->name('hash_generate');
        Route::get('list', [HashController::class, 'list']);
    });
});
