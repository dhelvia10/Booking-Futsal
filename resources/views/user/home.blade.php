@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Selamat Datang, {{ Auth::user()->name }}</h3>

    <div class="row">
        <!-- Kartu Booking Saya -->
        <div class="col-md-6">
            <a href="{{ route('user.bookings') }}" class="text-decoration-none">
                <div class="card p-4 shadow-sm">
                    <h4>📅 Booking Saya</h4>
                    <p class="text-muted">Lihat semua booking yang pernah kamu buat.</p>
                </div>
            </a>
        </div>

        <!-- Kartu Booking Baru -->
        <div class="col-md-6">
            <a href="{{ route('bookings.create') }}" class="text-decoration-none">
                <div class="card p-4 shadow-sm">
                    <h4>📝 Booking Baru</h4>
                    <p class="text-muted">Pesan lapangan futsal sekarang.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
