@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Booking Saya</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-3 shadow-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bookings as $b)
                    <tr>
                        <td>{{ $b->field->name }}</td>
                        <td>{{ $b->date }}</td>
                        <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                        <td>Rp {{ number_format($b->total_price) }}</td>
                        <td>
                            <span class="badge bg-primary">{{ ucfirst($b->status) }}</span>
                        </td>
                        <td>
                            <a href="{{ route('user.booking.detail', $b->id) }}" class="btn btn-sm btn-info">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
