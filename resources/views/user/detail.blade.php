@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <a href="{{ route('user.bookings') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card p-4 shadow-sm">

        <h3 class="mb-3">Detail Booking</h3>

        <div class="mb-2"><strong>Lapangan:</strong> {{ $booking->field->name }}</div>
        <div class="mb-2"><strong>Tanggal:</strong> {{ $booking->date }}</div>
        <div class="mb-2"><strong>Jam:</strong> {{ $booking->start_time }} - {{ $booking->end_time }}</div>
        <div class="mb-2"><strong>Nama Pemesan:</strong> {{ $booking->customer_name }}</div>
        <div class="mb-2"><strong>Nomor HP:</strong> {{ $booking->customer_phone }}</div>
        <div class="mb-2"><strong>Total Harga:</strong> Rp {{ number_format($booking->total_price) }}</div>
        <div class="mb-3"><strong>Status:</strong>
            <span class="badge bg-primary">{{ ucfirst($booking->status) }}</span>
        </div>

    </div>
</div>
@endsection
