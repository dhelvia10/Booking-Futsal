<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        $fields = Field::all();
        // Jumlah total lapangan
        $total_fields = Field::count();

        // Jumlah total booking
        $total_bookings = Booking::count();

        // Booking terbaru (5 terakhir)
        $latest_bookings = Booking::with('field')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Jadwal booking hari ini
        $today_schedule = Booking::with('field')
            ->where('date', date('Y-m-d'))
            ->orderBy('start_time', 'asc')
            ->get();

        return view('admin.dashboard', compact(
            'total_fields',
            'total_bookings',
            'latest_bookings',
            'today_schedule'
        ));
    }
}
