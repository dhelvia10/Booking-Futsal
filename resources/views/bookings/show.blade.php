@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Detail Booking</h3>

    <div class="card p-4 shadow-sm">
        <h5 class="mb-3">{{ $booking->field->name }}</h5>

        <p><strong>Tanggal:</strong> {{ $booking->date }}</p>
        <p><strong>Jam:</strong> {{ $booking->start_time }} - {{ $booking->end_time }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($booking->total_price) }}</p>
        <p><strong>Status:</strong> 
            <span class="badge bg-primary">{{ ucfirst($booking->status) }}</span>
        </p>

        <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</div>
@endsection
