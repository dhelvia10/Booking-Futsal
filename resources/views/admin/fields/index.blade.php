@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Kelola Lapangan</h2>
        <a href="{{ route('admin.fields.create') }}" class="btn btn-primary">
            Tambah Lapangan
        </a>
    </div>

    @if($fields->count() == 0)
        <div class="alert alert-warning">
            Belum ada lapangan ditambahkan.
        </div>
    @else
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Daftar Lapangan
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Type</th>
                        <th>Harga / Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fields as $i=>$f)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $f->name }}</td>
                        <td>{{ $f->type }}</td>
                        <td>Rp {{ number_format($f->price_per_hour,0,',','.') }}</td>

                        <td>
                            <a href="{{ route('admin.fields.edit', $f->id) }}" 
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.fields.delete', $f->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Hapus lapangan ini?')"
                                        class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
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
