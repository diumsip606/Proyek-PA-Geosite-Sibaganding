<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.hero-slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.hero-slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_slider.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('hero-sliders', $filename, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        HeroSlider::create($data);

        return redirect()->route('admin.hero-slider.index')
            ->with('success', 'Slide Beranda berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('admin.hero-slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada di storage
            if (Str::startsWith($slider->gambar, 'storage/')) {
                $oldPath = str_replace('storage/', '', $slider->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $gambar = $request->file('gambar');
            $filename = time() . '_slider.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('hero-sliders', $filename, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $slider->update($data);

        return redirect()->route('admin.hero-slider.index')
            ->with('success', 'Slide Beranda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        if (Str::startsWith($slider->gambar, 'storage/')) {
            $oldPath = str_replace('storage/', '', $slider->gambar);
            Storage::disk('public')->delete($oldPath);
        }

        $slider->delete();

        return redirect()->route('admin.hero-slider.index')
            ->with('success', 'Slide Beranda berhasil dihapus.');
    }
}
