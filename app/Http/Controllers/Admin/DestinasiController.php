<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    // 1. READ: Menampilkan semua data destinasi (Tabel)
    public function index()
    {
        $destinasi = Destinasi::paginate(10);
        return view('admin.destinasi.index', compact('destinasi'));
    }

    // 2. CREATE: Menampilkan halaman form tambah destinasi
    public function create()
    {
        $kategoriList = Kategori::all();
        return view('admin.destinasi.create', compact('kategoriList'));
    }

    // 3. STORE: Memproses penyimpanan data dari form ke database
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required',
            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'nullable|string'
        ]);

        // 2. Buat Slug Otomatis
        $validatedData['slug'] = Str::slug($request->nama);

        // 3. Set Admin yang Menambahkan
        // Ubah auth()->id() menjadi pemanggilan Facade Auth seperti ini:
        $validatedData['admin_id'] = \Illuminate\Support\Facades\Auth::id();

        // 4. Tangani Status (Kalau checkbox tidak dicentang, nilainya false)
        $validatedData['status'] = $request->has('status') ? true : false;

        // 5. Tangani Tags (Ubah teks yang dipisah koma menjadi format JSON array)
        if ($request->filled('tags')) {
            $tagsArray = array_map('trim', explode(',', $request->tags));
            $validatedData['tags'] = json_encode($tagsArray);
        }

        // 6. Tangani Upload Gambar Utama
        if ($request->hasFile('gambar_utama')) {
            $validatedData['gambar_utama'] = $request->file('gambar_utama')->store('destinasi', 'public');
        }

        // 7. Simpan ke Database
        Destinasi::create($validatedData);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    // 4. SHOW: Menampilkan detail spesifik satu destinasi di dasbor admin
    public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('admin.destinasi.show', compact('destinasi'));
    }

    // 5. EDIT: Menampilkan halaman form edit destinasi
    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        // Ambil data kategori untuk ditampilkan di dropdown form edit
        $kategoriList = \App\Models\Kategori::all();

        // Kirim $destinasi dan $kategoriList ke view
        return view('admin.destinasi.edit', compact('destinasi', 'kategoriList'));
    }

    // 6. UPDATE: Memproses perubahan data dari form edit ke database
    public function update(Request $request, $id)
    {
        // 1. Cari data destinasi yang mau diedit
        $destinasi = Destinasi::findOrFail($id);

        // 2. Validasi inputan form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required',
            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tags' => 'nullable|string'
        ]);

        // 3. Buat ulang slug dan status
        $validatedData['slug'] = \Illuminate\Support\Str::slug($request->nama);
        $validatedData['status'] = $request->has('status') ? true : false;

        // 4. Tangani Tags (JSON)
        if ($request->filled('tags')) {
            $tagsArray = array_map('trim', explode(',', $request->tags));
            $validatedData['tags'] = json_encode($tagsArray);
        } else {
            $validatedData['tags'] = null;
        }

        // 5. Tangani Gambar Utama (Timpa gambar lama jika ada yang baru)
        if ($request->hasFile('gambar_utama')) {
            $validatedData['gambar_utama'] = $request->file('gambar_utama')->store('destinasi', 'public');
        }

        // 6. Update data ke database
        $destinasi->update($validatedData);

        // 7. Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('admin.destinasi.index')->with('success', 'Data destinasi berhasil diperbarui!');
    }

    // 7. DESTROY: Memproses penghapusan data
    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();

        return back()->with('success', 'Data destinasi berhasil dihapus!');
    }
}
