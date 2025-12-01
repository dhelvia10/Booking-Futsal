<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Halaman Home - List semua lapangan
     */
    public function index()
{
    $fields = Field::all();
    return view('admin.fields.index', compact('fields'));
}


    /**
     * Detail salah satu lapangan
     */
    public function show($id)
    {
        $field = Field::findOrFail($id);
        return view('admin.fields.show', compact('field'));
    }

    /**
     * ================ ADMIN SECTION =================
     */

    /**
     * List semua lapangan untuk admin
     */
    public function adminIndex()
    {
        $fields = Field::all();
        return view('admin.fields.index', compact('fields'));
    }

    /**
     * Form tambah lapangan
     */
    public function create()
    {
        return view('admin.fields.create');
    }

    /**
     * Simpan lapangan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
        ]);

        Field::create([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
        ]);

        return redirect()->route('admin.fields.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }

    /**
     * Form edit lapangan
     */
    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('admin.fields.edit', compact('field'));
    }

    /**
     * Update data lapangan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric',
        ]);

        $field = Field::findOrFail($id);
        $field->update([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
        ]);

        return redirect()->route('admin.fields.index')->with('success', 'Lapangan berhasil diperbarui!');
    }

    /**
     * Hapus lapangan
     */
    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        $field->delete();

        return back()->with('success', 'Lapangan berhasil dihapus!');
    }
}
