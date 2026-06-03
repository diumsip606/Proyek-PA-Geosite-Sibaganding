<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarisanGeologi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WarisanGeologiController extends Controller
{
    public function index()
    {
        $slides = WarisanGeologi::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.warisan-geologi.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.warisan-geologi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'card_angka' => 'required|string|max:50',
            'card_teks' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'deskripsi' => $request->deskripsi,
            'card_angka' => $request->card_angka,
            'card_teks' => $request->card_teks,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_warisan.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('warisan-geologi', $filename, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        WarisanGeologi::create($data);

        return redirect()->route('admin.warisan-geologi.index')
            ->with('success', 'Slide Warisan Geologi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slide = WarisanGeologi::findOrFail($id);
        return view('admin.warisan-geologi.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $slide = WarisanGeologi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'card_angka' => 'required|string|max:50',
            'card_teks' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'deskripsi' => $request->deskripsi,
            'card_angka' => $request->card_angka,
            'card_teks' => $request->card_teks,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('gambar')) {
            if (Str::startsWith($slide->gambar, 'storage/')) {
                $oldPath = str_replace('storage/', '', $slide->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $gambar = $request->file('gambar');
            $filename = time() . '_warisan.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('warisan-geologi', $filename, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $slide->update($data);

        return redirect()->route('admin.warisan-geologi.index')
            ->with('success', 'Slide Warisan Geologi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $slide = WarisanGeologi::findOrFail($id);

        if (Str::startsWith($slide->gambar, 'storage/')) {
            $oldPath = str_replace('storage/', '', $slide->gambar);
            Storage::disk('public')->delete($oldPath);
        }

        $slide->delete();

        return redirect()->route('admin.warisan-geologi.index')
            ->with('success', 'Slide Warisan Geologi berhasil dihapus.');
    }
}
