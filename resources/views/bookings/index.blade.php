@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Semua Booking</h3>

    <table class="table table-bordered table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $b)
            <tr>
                <td>{{ $b->user->name ?? 'Peserta' }}</td>
                <td>{{ $b->field->name }}</td>
                <td>{{ $b->date }}</td>
                <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                <td>Rp {{ number_format($b->total_price) }}</td>
                <td><span class="badge bg-primary">{{ ucfirst($b->status) }}</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada booking.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
