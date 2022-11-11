<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserCarController;
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


Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('user', '\App\Http\Controllers\UserController');
Route::resource('car', '\App\Http\Controllers\CarController');

Route::get('/users_cars', [UserCarController::class, 'actionGetUsersCars'])->name('users_cars');
Route::post('/users_cars', [UserCarController::class, 'actionCreateUserCar']);
Route::get('/users_cars/{user_id}', [UserCarController::class, 'actionGetUserCar']);
Route::patch('/users_cars/{user_car_id}', [UserCarController::class, 'actionUpdateUserCar']);
Route::delete('/users_cars/{user_car_id}', [UserCarController::class, 'actionRemoveUserCar']);
