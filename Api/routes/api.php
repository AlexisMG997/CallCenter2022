<?php

use App\Http\Controllers\api\ViewCall;
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

Route::controller(ViewCall::class)->group(function () {
    Route::get('/ViewAllCalls', 'ViewAllCalls');
    Route::get('/viewSessions', 'viewSessions');
    Route::get('/viewSessionLog', 'viewSessionLog');
    Route::post('/recieveCall', 'recieveCall');
    Route::post('/endCall', 'endcall');
    Route::post('/loginAgent', 'loginAgent');
});