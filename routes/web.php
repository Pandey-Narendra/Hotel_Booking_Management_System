<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hotels\HotelController;
use App\Http\Controllers\Rooms\RoomController;
use App\Http\Controllers\Rooms\RoomsDetailController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// Hotel and Room Details
Route::prefix('hotels')->group(function () {
    Route::get('{id}/rooms', [RoomsDetailController::class, 'rooms'])->name('hotels.rooms');
    Route::get('room/{id}/details', [RoomsDetailController::class, 'details'])->name('room.details');
    Route::post('room/booking/{id}', [RoomsDetailController::class, 'booking'])->name('room.booking');
    
});

// Payment Routes
Route::prefix('hotels/room/booking')->middleware('auth', 'check.session.price')->group(function () {
    Route::get('pay', [RoomsDetailController::class, 'payWithPaypal'])->name('room.booking.pay');
    Route::get('success', [RoomsDetailController::class, 'success'])->name('room.booking.success');
});


// User
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('my_bookings', [UsersController::class, 'myBooking'])->name('users.booking');
});

// Admin
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login')->middleware('check.session.login');
    Route::post('login', [AdminController::class, 'checkLogin'])->name('admin.check');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admins', [AdminController::class, 'admins'])->name('admin.admins');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('create', [AdminController::class, 'createAdmin'])->name('admin.create.admin');
    
});

Route::resource('rooms', RoomController::class);
Route::resource('hotels', HotelController::class);