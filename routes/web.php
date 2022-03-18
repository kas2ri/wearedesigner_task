<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get("/profile/{id}", [ProfileController::class, 'index']);
Route::post("/profile-update/{id}", [ProfileController::class, 'update']);

//company routs
Route::get("/companies", [CompanyController::class, 'index']);
Route::get("/companies-create", [CompanyController::class, 'create']);
Route::post("/companies-store", [CompanyController::class, 'store']);
Route::get("/companies-edit/{id}", [CompanyController::class, 'edit']);
Route::post("/companies-update/{id}", [CompanyController::class, 'update']);
Route::get("/companies-delete/{id}", [CompanyController::class, 'delete']);
Route::get("/companies-remove-logo/{id}", [CompanyController::class, 'removeLogo']);
Route::get("/companies-remove-cover/{id}", [CompanyController::class, 'removeCover']);


//employee routs
Route::get("/employee", [EmployeeController::class, 'index']);
Route::get("/employee-create", [EmployeeController::class, 'create']);
Route::post("/employee-store", [EmployeeController::class, 'store']);
Route::get("/employee-edit/{id}", [EmployeeController::class, 'edit']);
Route::post("/employee-update/{id}", [EmployeeController::class, 'update']);
Route::get("/employee-delete/{id}", [EmployeeController::class, 'delete']);
Route::get("/employee-remove-profile_image/{id}", [EmployeeController::class, 'removeImage']);
