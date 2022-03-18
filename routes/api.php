<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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


Route::post("/register", [ApiController::class, 'register']);
Route::get("/login", [ApiController::class, 'login']);
Route::get("/profile", [ApiController::class, 'profile'])->middleware('auth:api');
Route::get("/employees", [ApiController::class, 'employee'])->middleware('auth:api');
Route::get("/companies", [ApiController::class, 'company'])->middleware('auth:api');
Route::get("/logout", [ApiController::class, 'logout'])->middleware('auth:api');