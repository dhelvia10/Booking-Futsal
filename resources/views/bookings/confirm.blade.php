@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Booking</h1>

    <p>Lapangan: {{ $field->name }}</p>
    <p>Tanggal: {{ $date }}</p>
    <p>Jam Mulai: {{ $start_time }}</p>
    <p>Jam Selesai: {{ $end_time }}</p>

   <form action="{{ route('bookings.store') }}" method="POST">
    @csrf

    <input type="hidden" name="field_id" value="{{ $field->id }}">
    <input type="hidden" name="date" value="{{ $date }}">
    <input type="hidden" name="start_time" value="{{ $start_time }}">
    <input type="hidden" name="end_time" value="{{ $end_time }}">
    <input type="hidden" name="total_price" value="{{ $total_price }}">

    <div class="mb-3">
        <label>Nama Pemesan</label>
        <input type="text" name="customer_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="customer_phone" class="form-control" required>
    </div>

    <button class="btn btn-primary">Konfirmasi Booking</button>
</form>

</div>
@endsection
