<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaSTKPUSHController;
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


Route::resource('teachers', App\Http\Controllers\API\TeacherAPIController::class)
    ->except(['create', 'edit']);

Route::resource('students', App\Http\Controllers\API\StudentAPIController::class)
    ->except(['create', 'edit']);

Route::post('v1/access/token', [MpesaSTKPUSHController::class, 'generateAccessToken']);

Route::post('v1/hlab/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);