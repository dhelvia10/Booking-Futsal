@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Tambah Lapangan</h3>

    <form action="{{ route('fields.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Lapangan</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga per Jam</label>
            <input type="number" name="price_per_hour" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Simpan</button>
    </form>
</div>
@endsection
