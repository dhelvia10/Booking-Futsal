@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Booking Lapangan: {{ $field->name }}</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('booking.check') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <input type="hidden" name="field_id" value="{{ $field->id }}">

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <button class="btn btn-primary mt-2">Cek Ketersediaan</button>
    </form>

</div>
@endsection
