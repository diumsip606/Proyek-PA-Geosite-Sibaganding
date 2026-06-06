<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    // 1. READ: Menampilkan semua data destinasi
    public function index()
    {
        $destinasi = Destinasi::with('kategori')->paginate(10);
        return view('admin.destinasi.index', compact('destinasi'));
    }

    // 2. CREATE: Menampilkan form tambah destinasi
    public function create()
    {
        $kategoriList = Kategori::all();
        return view('admin.destinasi.create', compact('kategoriList'));
    }

    // 3. STORE: Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'lokasi'       => 'required|string|max:100',
            'deskripsi'    => 'required',
            'gambar_utama' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,bmp|max:5120',
        ]);

        $data = [
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . time(),
            'kategori_id' => $request->kategori_id,
            'lokasi'      => $request->lokasi,
            'deskripsi'   => $request->deskripsi,
            'status'      => $request->has('status') ? true : false,
            'admin_id'    => Auth::id(),
        ];

        // Upload gambar ke public/uploads/destinasi
        if ($request->hasFile('gambar_utama')) {
            $gambar     = $request->file('gambar_utama');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/destinasi'), $namaGambar);
            $data['gambar_utama'] = 'uploads/destinasi/' . $namaGambar;
        }

        Destinasi::create($data);

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    // 4. SHOW: Detail destinasi
    public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('admin.destinasi.show', compact('destinasi'));
    }

    // 5. EDIT: Form edit destinasi
    public function edit($id)
    {
        $destinasi    = Destinasi::findOrFail($id);
        $kategoriList = Kategori::all();
        return view('admin.destinasi.edit', compact('destinasi', 'kategoriList'));
    }

    // 6. UPDATE: Proses update data
    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'lokasi'       => 'required|string|max:100',
            'deskripsi'    => 'required',
            'gambar_utama' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,bmp|max:5120',
        ]);

        $data = [
            'nama'        => $request->nama,
            'slug'        => Str::slug($request->nama) . '-' . $destinasi->id,
            'kategori_id' => $request->kategori_id,
            'lokasi'      => $request->lokasi,
            'deskripsi'   => $request->deskripsi,
            'status'      => $request->has('status') ? true : false,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar_utama')) {
            // Hapus gambar lama dari public/uploads/destinasi
            if ($destinasi->gambar_utama && file_exists(public_path($destinasi->gambar_utama))) {
                unlink(public_path($destinasi->gambar_utama));
            }

            $gambar     = $request->file('gambar_utama');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/destinasi'), $namaGambar);
            $data['gambar_utama'] = 'uploads/destinasi/' . $namaGambar;
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Data destinasi berhasil diperbarui!');
    }

    // 7. DESTROY: Hapus data
    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        // Hapus file gambar
        if ($destinasi->gambar_utama && file_exists(public_path($destinasi->gambar_utama))) {
            unlink(public_path($destinasi->gambar_utama));
        }

        $destinasi->delete();

        return back()->with('success', 'Data destinasi berhasil dihapus!');
    }
}
