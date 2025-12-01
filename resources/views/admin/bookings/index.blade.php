@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Daftar Semua Booking</h2>

    @if ($bookings->count() == 0)
        <div class="alert alert-warning">
            Belum ada booking.
        </div>
    @else

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Semua Booking
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bookings as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b->user->name ?? 'Peserta' }}</td>
                        <td>{{ $b->field->name }}</td>
                        <td>{{ $b->date }}</td>
                        <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                        <td>Rp {{ number_format($b->total_price, 0, ',', '.') }}</td>

                        <td>
                            <span class="badge 
                                @if($b->status == 'booked') bg-success 
                                @elseif($b->status == 'cancelled') bg-danger 
                                @else bg-secondary 
                                @endif
                            ">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('admin.bookings.show', $b->id) }}" 
                               class="btn btn-sm btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @endif

</div>
@endsection
