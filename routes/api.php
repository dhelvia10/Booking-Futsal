<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LapanganController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PaymentCallbackController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Semua route API akan otomatis memakai prefix "/api".
| Contoh: Route::get('/lapangan') → http://localhost:8000/api/lapangan
|
*/

// ---- Test Route (Cek API Berfungsi) ----
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API Berfungsi!'
    ]);
});


// ---- Lapangan Route ----
// GET http://localhost:8000/api/lapangan
Route::get('/lapangan', [LapanganController::class, 'index']);
Route::post('/midtrans/token', [MidtransController::class, 'token']);
Route::post('/midtrans/callback', [App\Http\Controllers\MidtransController::class, 'callback']);
Route::post('/midtrans/callback', [PaymentCallbackController::class, 'handle']);

// ---- CRUD Booking (Otomatis Menghasilkan 5 route) ----
// GET /api/booking
// POST /api/booking
// GET /api/booking/{id}
// PUT /api/booking/{id}
// DELETE /api/booking/{id}
Route::apiResource('booking', BookingController::class);
