<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

use App\Http\Controllers\AdminController;
Route::resource('admin',AdminController::class);
Route::get('admin/$admin', 'App\Http\Controllers\AdminController@index')->middleware('auth');

use App\Http\Controllers\AccountController;
Route::resource('account',AccountController::class);
Route::get('account/$account', 'App\Http\Controllers\AccountController@index')->middleware('auth');

use App\Http\Controllers\MobileController;
Route::resource('mobile',MobileController::class);
Route::get('mobile/$mobile', 'App\Http\Controllers\MobileController@index')->middleware('auth');

use App\Http\Controllers\WebdevController;
Route::resource('webdev',WebdevController::class);
Route::get('webdev/$webdev', 'App\Http\Controllers\WebdevController@index')->middleware('auth');

use App\Http\Controllers\SaleController;
Route::resource('sale',SaleController::class);
Route::get('sale/$sale', 'App\Http\Controllers\SaleController@index')->middleware('auth');

use App\Http\Controllers\GraphicController;
Route::resource('graphic',GraphicController::class);
Route::get('graphic/$graphic', 'App\Http\Controllers\GraphicController@index')->middleware('auth');

use App\Http\Controllers\QaController;
Route::resource('qa',QaController::class);
Route::get('qa/$qa', 'App\Http\Controllers\QaController@index')->middleware('auth');

