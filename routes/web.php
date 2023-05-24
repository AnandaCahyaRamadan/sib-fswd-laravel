<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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


route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/',[\App\Http\Controllers\LandingController::class, 'index']);
// Route::get('/', function (){
//     return view('landing');
// });
Auth::routes();
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::resource('/products', \App\Http\Controllers\ProductController::class)->middleware('auth');

