<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('field', 'user')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with('field', 'user')->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }
}
