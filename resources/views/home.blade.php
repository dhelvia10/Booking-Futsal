@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center mb-5">
        <h1 class="fw-bold">Selamat Datang Di Booking Lapangan</h1>
        <p class="text-muted">Silakan pilih lapangan dan lakukan pemesanan dengan mudah.</p>
    </div>

    <div class="row">
        @forelse($fields as $field)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">

                    @if($field->image)
                        <img src="{{ asset('storage/' . $field->image) }}" class="card-img-top" alt="Field">
                    @else
                        <img src="https://via.placeholder.com/600x350?text=No+Image" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $field->name }}</h5>
                        <p class="card-text">
                            Harga: <strong>Rp {{ number_format($field->price, 0, ',', '.') }}</strong><br>
                            {{ Str::limit($field->description, 80) }}
                        </p>

                        <a href="{{ route('bookings.create', ['field_id' => $field->id]) }}" class="btn btn-primary w-100">
    Booking Sekarang
</a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada lapangan tersedia.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
