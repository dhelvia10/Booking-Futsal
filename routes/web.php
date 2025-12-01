<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public / User Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Booking list (user)
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

// Form create booking
Route::get('/bookings/create/{field_id}', [BookingController::class, 'create'])
     ->name('bookings.create');



// Simpan booking
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');



Route::get('/bookings/my-bookings', [BookingController::class, 'userBookings'])
    ->name('bookings.my-booking');


// Cek jadwal booking
Route::post('/bookings/check', [BookingController::class, 'check'])
     ->name('booking.check');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Fields (CRUD)
    Route::resource('fields', FieldController::class)->names([
        'index'   => 'admin.fields.index',
        'create'  => 'admin.fields.create',
        'store'   => 'admin.fields.store',
        'edit'    => 'admin.fields.edit',
        'update'  => 'admin.fields.update',
        'destroy' => 'admin.fields.delete',
    ]);

    // Admin Booking Pages
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'adminShow'])->name('admin.bookings.show');
   
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])
    ->name('user.bookings');

    // USER — DETAIL BOOKING
Route::get('/my-booking/{id}', [BookingController::class, 'show'])
    ->name('user.booking.detail');

    // Booking user (RIIL USER, BUKAN ADMIN)
Route::get('/my-bookings', [BookingController::class, 'userBookings'])
    ->name('user.bookings');

Route::get('/my-bookings/{id}', [BookingController::class, 'userBookingDetail'])
    ->name('user.booking.detail');

Route::get('/admin/bookings/{booking}', [BookingController::class, 'adminShow'])
    ->name('admin.bookings.show');

    // Semua booking (admin)
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

// Tambah booking
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');

// Detail booking
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');

Route::get('/bookings/detail/{booking}', [BookingController::class, 'show'])
    ->name('bookings.show');

});
