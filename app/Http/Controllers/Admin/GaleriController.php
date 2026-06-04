<?php
// app/Http/Controllers/Admin/GaleriController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('kategori')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama')->get();
        return view('admin.galeri.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'deskripsi'    => 'required|string',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lokasi'       => 'nullable|string|max:255',
            'status'       => 'nullable|boolean',
            'is_hero'      => 'nullable|boolean',
        ]);

        // Ambil nama kategori untuk folder
        $kategori  = Kategori::findOrFail($request->kategori_id);
        $folder    = $this->getFolderByKategori($kategori->nama);

        // Upload gambar
        $gambar    = $request->file('gambar');
        $filename  = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
        $path      = $gambar->storeAs($folder, $filename, 'public');

        $isHero = $request->has('is_hero') ? 1 : 0;
        if ($isHero) {
            Galeri::where('is_hero', true)->update(['is_hero' => false]);
        }

        // Simpan ke database
        Galeri::create([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul) . '-' . time(),
            'kategori_id' => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $path,
            'lokasi'      => $request->lokasi ?? 'Geosite Sibaganding',
            'status'      => $request->has('status') ? 1 : 0,
            'is_hero'     => $isHero,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeri    = Galeri::with('kategori')->findOrFail($id);
        $kategoris = Kategori::orderBy('nama')->get();
        return view('admin.galeri.edit', compact('galeri', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi'   => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lokasi'      => 'nullable|string|max:255',
            'status'      => 'nullable|boolean',
            'is_hero'     => 'nullable|boolean',
        ]);

        $isHero = $request->has('is_hero') ? 1 : 0;
        if ($isHero) {
            Galeri::where('is_hero', true)->update(['is_hero' => false]);
        }

        $data = [
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul) . '-' . $galeri->id,
            'kategori_id' => $request->kategori_id,
            'deskripsi'   => $request->deskripsi,
            'lokasi'      => $request->lokasi ?? 'Geosite Sibaganding',
            'status'      => $request->has('status') ? 1 : 0,
            'is_hero'     => $isHero,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $kategori        = Kategori::findOrFail($request->kategori_id);
            $folder          = $this->getFolderByKategori($kategori->nama);
            $gambar          = $request->file('gambar');
            $filename        = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $data['gambar']  = $gambar->storeAs($folder, $filename, 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar dari storage
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $galeri         = Galeri::findOrFail($id);
        $galeri->status = !$galeri->status;
        $galeri->save();

        return redirect()->back()
            ->with('success', 'Status galeri berhasil diubah!');
    }

    public function setHero($id)
    {
        // Reset semua is_hero
        Galeri::where('is_hero', true)->update(['is_hero' => false]);

        // Set hero baru
        $galeri          = Galeri::findOrFail($id);
        $galeri->is_hero = true;
        $galeri->save();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Gambar hero halaman galeri berhasil diperbarui!');
    }

    public function unsetHero($id)
    {
        $galeri          = Galeri::findOrFail($id);
        $galeri->is_hero = false;
        $galeri->save();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Gambar hero berhasil dinonaktifkan!');
    }

   private function getFolderByKategori(string $namaKategori): string
{
    $slug = Str::slug($namaKategori);
    return "galeri/{$slug}";
}
}
