<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // wajib login + admin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // nanti kita buat
    }

    public function index()
    {
        $bookings = Booking::with('field')
            ->orderBy('date', 'DESC')
            ->get();

        return view('bookings.index', compact('bookings'));
    }
}
