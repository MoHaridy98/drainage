<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard Site
|--------------------------------------------------------------------------
*/

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){

/*
|--------------------------------------------------------------------------
| Dashboard agr
|--------------------------------------------------------------------------
*/

    Route::get('/agr', [App\Http\Controllers\Pages\AgrController::class, 'agr'])->name('agr.list');
    Route::get('/agr-edit{id}', [App\Http\Controllers\Pages\AgrController::class, 'agrEdit'])->name('agr.edit');
    Route::get('/agr-create', [App\Http\Controllers\Pages\AgrController::class, 'agrCreate'])->name('agr.create');
    Route::post('/agr-store', [App\Http\Controllers\Pages\AgrController::class, 'store'])->name('agr.store');

    Route::get('/farmer', [App\Http\Controllers\Pages\AgrController::class, 'farmer'])->name('agr.farmer');
    Route::get('/farmer-edit{id}', [App\Http\Controllers\Pages\AgrController::class, 'farmerEdit'])->name('agr.farmerEdit');
    Route::get('/farmer-create', [App\Http\Controllers\Pages\AgrController::class, 'farmerCreate'])->name('agr.farmerCreate');
    Route::post('/farmer-store', [App\Http\Controllers\Pages\AgrController::class, 'farmerStore'])->name('agr.farmerStore');
    
    /*
|--------------------------------------------------------------------------
| Dashboard space
|--------------------------------------------------------------------------
*/
    Route::Post('/update{id}', [App\Http\Controllers\Pages\SpaceController::class, 'create'])->name('space.update');
    Route::get('/space', [App\Http\Controllers\Pages\SpaceController::class, 'space'])->name('space.list');
    Route::get('/space-create{id}', [App\Http\Controllers\Pages\SpaceController::class, 'index'])->name('space');
/*
|--------------------------------------------------------------------------
| Dashboard taxes
|--------------------------------------------------------------------------
*/
    Route::get('/taxes', [App\Http\Controllers\Pages\TaxesController::class, 'taxes'])->name('taxes.list');
    Route::get('/taxes-create', [App\Http\Controllers\Pages\TaxesController::class, 'index'])->name('taxes');
/*
|--------------------------------------------------------------------------
| Dashboard sewage
|--------------------------------------------------------------------------
*/
    Route::post('/create', [App\Http\Controllers\Pages\ProjectController::class, 'store'])->name('sewage.create');
    Route::get('/sewage-edit{id}', [App\Http\Controllers\Pages\SewageController::class, 'edit'])->name('sewage.edit');
    Route::post('/sewage-update{id}', [App\Http\Controllers\Pages\SewageController::class, 'update'])->name('sewage.update');
    Route::get('/sewage-delete{id}', [App\Http\Controllers\Pages\SewageController::class, 'destroy'])->name('sewage.delete');
    Route::get('/sewage', [App\Http\Controllers\Pages\SewageController::class, 'sewage'])->name('sewage.list');
    Route::get('/sewage-create', [App\Http\Controllers\Pages\SewageController::class, 'index'])->name('sewage');
/*
|--------------------------------------------------------------------------
| Dashboard sewage
|--------------------------------------------------------------------------
*/
    //Route::get('/meeting', [App\Http\Controllers\Pages\MeetController::class, 'meet'])->name('meeting.list');
    Route::get('/meeting-create', [App\Http\Controllers\Pages\MeetController::class, 'index'])->name('meeting');
  });

  /*
|--------------------------------------------------------------------------
| Dashboard Site
|--------------------------------------------------------------------------
*/
