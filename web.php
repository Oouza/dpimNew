<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return view('frontend.testDate');
});
Auth::routes();

Route::get('testDate', [App\Http\Controllers\FrontendController::class, 'testDate']);

Route::get('testLine', [App\Http\Controllers\FrontendController::class, 'testLine']);

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::get('serach/tyep/{restype}', [App\Http\Controllers\FrontendController::class, 'searchType']);
Route::get('search/name', [App\Http\Controllers\FrontendController::class, 'searchName']);

Route::get('loginUser', [App\Http\Controllers\FrontendController::class, 'loginUser']);
Route::get('regiterCus', [App\Http\Controllers\FrontendController::class, 'regiterCus']);
Route::post('regiterCustomer/add', [App\Http\Controllers\FrontendController::class, 'regiterCusAdd']);
Route::get('edit/cus/{id}', [App\Http\Controllers\FrontendController::class, 'editCus']);
Route::post('edit/cus/update/{id}', [App\Http\Controllers\FrontendController::class, 'editCusUpdate']);

Route::get('loginRes', [App\Http\Controllers\FrontendController::class, 'loginRes']);
Route::get('regiterResterant', [App\Http\Controllers\FrontendController::class, 'regiterResterant']);
Route::post('regiterResterant/add', [App\Http\Controllers\FrontendController::class, 'regiterResterantAdd']);

// Route::get('edit/resterant/{id}', [App\Http\Controllers\EditResterant::class, 'editRseterant']);

Route::get('edit/resterant/{id}', [App\Http\Controllers\EditResterant::class, 'editRseterant']);
Route::post('edit/resterant/update/{id}', [App\Http\Controllers\EditResterant::class, 'editRseterantUpdate']);

Route::get('edit/atmosphere/{id}', [App\Http\Controllers\EditResterant::class, 'editAtmosphere']);
Route::post('edit/atmosphere/update/{id}', [App\Http\Controllers\EditResterant::class, 'editAtmosphereUpdate']);
Route::get('edit/atmosphere/delete/{num}/{id}', [App\Http\Controllers\EditResterant::class, 'editAtmosphereEdit']);

Route::get('edit/food/{id}', [App\Http\Controllers\EditResterant::class, 'editFood']);
Route::post('edit/food/update/{id}', [App\Http\Controllers\EditResterant::class, 'editFoodUpdate']);
Route::get('edit/food/delete/{num}/{id}', [App\Http\Controllers\EditResterant::class, 'editFoodDelete']);

Route::get('edit/owner/{id}', [App\Http\Controllers\EditResterant::class, 'editOwner']);
Route::post('edit/owner/update/{id}', [App\Http\Controllers\EditResterant::class, 'editOwnerUpdate']);

Route::get('res/confirm/book/{id}', [App\Http\Controllers\BookController::class, 'resConfirm']);
Route::get('res/cancle/book/{id}', [App\Http\Controllers\BookController::class, 'resCancle']);

Route::get('res/manage/book/{id}', [App\Http\Controllers\BookController::class, 'resManage']);

// customer
Route::get('resterant/detail/{id}', [App\Http\Controllers\FrontendController::class, 'detailRseterant']);
Route::get('book/{id}', [App\Http\Controllers\BookController::class, 'book']);
Route::post('searchTime', [App\Http\Controllers\BookController::class, 'searchTime']);
Route::post('book/add/{cus}/{res}', [App\Http\Controllers\BookController::class, 'bookAdd']);

Route::get('book/now/{id}', [App\Http\Controllers\BookController::class, 'bookNew']);
Route::get('cancle/book/{id}', [App\Http\Controllers\BookController::class, 'bookCancle']);


// Route::post('search/provice', [App\Http\Controllers\FrontendController::class, 'searchProvice']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('searchProvice', [App\Http\Controllers\FrontendController::class, 'searchProvice']);
Route::post('searchAmphure', [App\Http\Controllers\FrontendController::class, 'searchAmphure']);

Route::post('provice', [App\Http\Controllers\FrontendController::class, 'provice']);
Route::post('amphure', [App\Http\Controllers\FrontendController::class, 'amphure']);