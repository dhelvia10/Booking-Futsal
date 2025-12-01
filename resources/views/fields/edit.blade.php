@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Edit Lapangan</h3>

    <form action="{{ route('fields.update', $field->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Lapangan</label>
            <input type="text" name="name" class="form-control" value="{{ $field->name }}" required>
        </div>

        <div class="mb-3">
            <label>Harga per Jam</label>
            <input type="number" name="price_per_hour" class="form-control" value="{{ $field->price_per_hour }}" required>
        </div>

        <button class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection
