<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Informasi::latest();

        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        } else {
            $query->where('kategori', '!=', 'Pengurus');
        }

        $informasi = $query->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'konten'   => 'required|string',
            'kategori' => 'required|string',
            'penulis'  => 'required|string|max:255',
            'gambar'   => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'judul.required'    => 'Judul wajib diisi.',
            'konten.required'   => 'Konten wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'penulis.required'  => 'Penulis/Jabatan wajib diisi.',
            'gambar.required'   => 'Gambar wajib diunggah.',
            'gambar.image'      => 'File harus berupa gambar.',
            'gambar.mimes'      => 'Format gambar: jpeg, png, jpg, atau webp.',
            'gambar.max'        => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul) . '-' . time(),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'penulis'  => $request->penulis,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $gambar     = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/informasi'), $namaGambar);
            $data['gambar'] = 'uploads/informasi/' . $namaGambar;
        }

        Informasi::create($data);

        $redirect = $request->kategori === 'Pengurus'
            ? route('admin.informasi.index', ['kategori' => 'Pengurus'])
            : route('admin.informasi.index');

        return redirect($redirect)->with('success',
            $request->kategori === 'Pengurus'
                ? 'Pengurus berhasil ditambahkan!'
                : 'Informasi berhasil ditambahkan!'
        );
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'konten'   => 'required|string',
            'kategori' => 'required|string',
            'penulis'  => 'required|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'judul.required'    => 'Judul wajib diisi.',
            'konten.required'   => 'Konten wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'penulis.required'  => 'Penulis/Jabatan wajib diisi.',
            'gambar.image'      => 'File harus berupa gambar.',
            'gambar.mimes'      => 'Format gambar: jpeg, png, jpg, atau webp.',
            'gambar.max'        => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul) . '-' . $informasi->id,
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'penulis'  => $request->penulis,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
                unlink(public_path($informasi->gambar));
            }
            $gambar     = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/informasi'), $namaGambar);
            $data['gambar'] = 'uploads/informasi/' . $namaGambar;
        }

        $informasi->update($data);

        $redirect = $request->kategori === 'Pengurus'
            ? route('admin.informasi.index', ['kategori' => 'Pengurus'])
            : route('admin.informasi.index');

        return redirect($redirect)->with('success',
            $request->kategori === 'Pengurus'
                ? 'Pengurus berhasil diperbarui!'
                : 'Informasi berhasil diperbarui!'
        );
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $kategori  = $informasi->kategori;

        if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
            unlink(public_path($informasi->gambar));
        }

        $informasi->delete();

        $redirect = $kategori === 'Pengurus'
            ? route('admin.informasi.index', ['kategori' => 'Pengurus'])
            : route('admin.informasi.index');

        return redirect($redirect)->with('success',
            $kategori === 'Pengurus'
                ? 'Pengurus berhasil dihapus!'
                : 'Informasi berhasil dihapus!'
        );
    }
}