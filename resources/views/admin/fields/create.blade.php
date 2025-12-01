@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Tambah Lapangan</h2>

    <form action="{{ route('admin.fields.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Lapangan</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipe Lapangan</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga per jam</label>
            <input type="number" name="price_per_hour" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
