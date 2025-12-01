@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Detail Booking</h2>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Informasi Booking
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>User:</strong><br>
                    {{ $booking->user->name ?? 'Tidak ditemukan' }}
                </div>

                <div class="col-md-6">
                    <strong>Lapangan:</strong><br>
                    {{ $booking->field->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Tanggal:</strong><br>
                    {{ $booking->date }}
                </div>

                <div class="col-md-4">
                    <strong>Jam Mulai:</strong><br>
                    {{ $booking->start_time }}
                </div>

                <div class="col-md-4">
                    <strong>Jam Selesai:</strong><br>
                    {{ $booking->end_time }}
                </div>
            </div>

            <div class="mb-3">
                <strong>Total Harga:</strong><br>
                <span class="badge bg-success" style="font-size: 1.1rem;">
                    Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                </span>
            </div>

            <div class="mb-3">
                <strong>Status Booking:</strong><br>
                <span class="badge 
                    @if($booking->status == 'booked') bg-success 
                    @elseif($booking->status == 'cancelled') bg-danger 
                    @else bg-secondary 
                    @endif
                ">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>

        </div>
    </div>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mt-3">
        Kembali ke Daftar Booking
    </a>

</div>
@endsection
