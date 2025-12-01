@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Bagian Admin</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Lapangan</h5>
                    <h2>{{ $total_fields }}</h2>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Booking</h5>
                    <h2>{{ $total_bookings }}</h2>

                </div>
            </div>
        </div>

    </div>

    <hr>

    <h4 class="mt-4">Menu Admin</h4>

    <a href="{{ route('admin.fields.index') }}" class="btn btn-outline-primary mt-2">
        Kelola Lapangan
    </a>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-success mt-2">
        Lihat Semua Booking
    </a>

</div>
@endsection
