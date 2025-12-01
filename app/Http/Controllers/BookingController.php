<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Field;

class BookingController extends Controller
{

    public function show($id)
{
    $booking = Booking::findOrFail($id);

    return view('bookings.show', compact('booking'));
}

    // Form booking user
    public function create($field_id)
    {
        $field = Field::findOrFail($field_id);
        return view('bookings.create', compact('field'));
    }

    // Cek jadwal
    public function check(Request $r)
    {
        $r->validate([
            'field_id' => 'required|exists:fields,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $field = Field::findOrFail($r->field_id);

        // cek bentrok
        $isBooked = Booking::where('field_id', $r->field_id)
            ->where('date', $r->date)
            ->where(function($q) use ($r) {
                $q->whereBetween('start_time', [$r->start_time, $r->end_time])
                  ->orWhereBetween('end_time', [$r->start_time, $r->end_time])
                  ->orWhere(function($x) use ($r) {
                      $x->where('start_time', '<=', $r->start_time)
                        ->where('end_time', '>=', $r->end_time);
                  });
            })
            ->exists();

        if ($isBooked) {
            return back()->with('error', 'Jadwal bentrok. Pilih jam lain.');
        }

        $start = strtotime($r->start_time);
        $end = strtotime($r->end_time);
        $hours = ($end - $start) / 3600;
        $total = $hours * $field->price_per_hour;

        return view('bookings.confirm', [
            'field' => $field,
            'date' => $r->date,
            'start_time' => $r->start_time,
            'end_time' => $r->end_time,
            'hours' => $hours,
            'total_price' => $total
        ]);
    }

    // Simpan booking user
  public function store(Request $r)
{
    $r->validate([
        'field_id' => 'required',
        'date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'customer_name' => 'required',
        'customer_phone' => 'required',
    ]);

    // cek bentrok ulang
    $isBooked = Booking::where('field_id', $r->field_id)
        ->where('date', $r->date)
        ->where(function($q) use ($r) {
            $q->whereBetween('start_time', [$r->start_time, $r->end_time])
              ->orWhereBetween('end_time', [$r->start_time, $r->end_time]);
        })
        ->exists();

    if ($isBooked) {
        return back()->with('error', 'Jadwal tidak tersedia');
    }

    Booking::create([
        'user_id' => auth()->id(),
        'field_id' => $r->field_id,
        'customer_name' => $r->customer_name,
        'customer_phone' => $r->customer_phone,
        'date' => $r->date,
        'start_time' => $r->start_time,
        'end_time' => $r->end_time,
        'total_price' => $r->total_price,
        'status' => 'pending'
    ]);

    return redirect()->route('user.bookings')->with('success', 'Booking berhasil');
}


    // List booking user
    public function userBookings()
    {
        $bookings = Booking::with('field')
            ->where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->get();

        return view('user.booking', compact('bookings'));
    }

    // Detail booking user
    public function userBookingDetail($id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->with('field')
            ->findOrFail($id);

        return view('user.detail', compact('booking'));
    }
    
    public function index()
{
    $bookings = Booking::orderBy('date', 'desc')->get();

    return view('bookings.index', compact('bookings'));
}

public function adminIndex()
{
    $bookings = Booking::with('field', 'user')
        ->orderBy('date', 'desc')
        ->get();

    return view('admin.bookings.index', compact('bookings'));
}

public function adminShow($id)
{
    $booking = Booking::with('field', 'user')->findOrFail($id);
    return view('admin.bookings.show', compact('booking'));
}

}
