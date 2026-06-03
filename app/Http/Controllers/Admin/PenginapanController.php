<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapans = Penginapan::latest()->paginate(10);
        return view('admin.penginapan.index', compact('penginapans'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'harga' => 'nullable|numeric',
        ]);

        $data = [
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . time(),
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'kontak' => $request->kontak,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/penginapan'), $namaGambar);
            $data['gambar'] = 'uploads/penginapan/' . $namaGambar;
        }

        Penginapan::create($data);

        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        return view('admin.penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'harga' => 'nullable|numeric',
        ]);

        $data = [
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . $penginapan->id,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'kontak' => $request->kontak,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('gambar')) {
            if ($penginapan->gambar && file_exists(public_path($penginapan->gambar))) {
                unlink(public_path($penginapan->gambar));
            }
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/penginapan'), $namaGambar);
            $data['gambar'] = 'uploads/penginapan/' . $namaGambar;
        }

        $penginapan->update($data);

        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        if ($penginapan->gambar && file_exists(public_path($penginapan->gambar))) {
            unlink(public_path($penginapan->gambar));
        }
        $penginapan->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil dihapus!');
    }
}
