@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Daftar Lapangan</h3>

    <a href="{{ route('admin.fields.create') }}" class="btn btn-primary mb-3">+ Tambah Lapangan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Lapangan</th>
                <th>Harga / Jam</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fields as $f)
            <tr>
                <td>{{ $f->name }}</td>
                <td>Rp {{ number_format($f->price_per_hour) }}</td>
                <td>
                    <a href="{{ route('admin.fields.edit', $f->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.fields.destroy', $f->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus lapangan?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
