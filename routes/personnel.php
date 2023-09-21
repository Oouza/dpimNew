<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;

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

Route::get('/clc', function () {

    Artisan::call('cache:clear');

    Artisan::call('config:clear');

    Artisan::call('config:cache');

    Artisan::call('view:clear');

    return "Cleared!";

});

Auth::routes();

Route::get('/backend/userHistury/GetTypecompany/{id}', [App\Http\Controllers\PersonnelInformationController::class, 'gettypecompany']);
Route::get('/backend/userHistury/Getcompany/{id}', [App\Http\Controllers\PersonnelInformationController::class, 'getcompany']);
Route::get('/backend/userHistury/Getdepartment/{id}', [App\Http\Controllers\PersonnelInformationController::class, 'getdepartment']);
Route::get('/backend/userHistury/Getdepartmentsub/{id}', [App\Http\Controllers\PersonnelInformationController::class, 'getdepartmentsub']);
Route::post('/backend/userHistury/edit/{id}', [App\Http\Controllers\PersonnelInformationController::class, 'update']);
