<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//register and update account details routes
Route::resource('users', UserController::class)->only([
    'store', 'update'
]);

//register and update account details routes
Route::resource('events', EventController::class)->only([
    'store', 'update', 'delete'
]);

Route::resource('attendees', AttendeeController::class)->only([
    'store', 'update', 'destroy'
]);

//auth routes
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//ai link route
//Route::post('/ai', )

//this is an example comment for demoing git (addition)