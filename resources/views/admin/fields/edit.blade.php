@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Edit Lapangan</h2>

    <form action="{{ route('admin.fields.update', $field->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lapangan</label>
            <input type="text" name="name" class="form-control" value="{{ $field->name }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe Lapangan</label>
            <input type="text" name="type" class="form-control" value="{{ $field->type }}" required>
        </div>

        <div class="mb-3">
            <label>Harga per jam</label>
            <input type="number" name="price_per_hour" class="form-control" value="{{ $field->price_per_hour }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
