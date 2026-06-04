<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
       $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'tanggal_terbit' => 'required',
            'link' => 'nullable|url',
        ], [
            'gambar.max' => 'Ukuran gambar maksimal 2MB!',
            'gambar.required' => 'Gambar wajib diisi!',
            'link.url' => 'Format link berita harus berupa URL yang valid (contoh: https://example.com)!',
        ]);

        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/berita'), $namaGambar);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'gambar' => 'uploads/berita/' . $namaGambar,

            // ✅ kategori default (AMAN)
            'kategori_id' => Kategori::first()->id,

            'penulis' => $request->penulis ?? 'Admin',
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->has('status'),
            'link' => $request->link,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        // kategori tidak dikirim ke view
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'          => 'required',
            'konten'         => 'required',
            'tanggal_terbit' => 'required',
            'link' => 'nullable|url',
        ], [
            'link.url' => 'Format link berita harus berupa URL yang valid (contoh: https://example.com)!',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,

            // ✅ tetap pakai default
            'kategori_id' => Kategori::first()->id,

            'penulis' => $request->penulis ?? 'Admin',
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->has('status'),
            'link' => $request->link,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);

            $data['gambar'] = 'uploads/berita/' . $namaGambar;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && file_exists(public_path($berita->gambar))) {
            unlink(public_path($berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}