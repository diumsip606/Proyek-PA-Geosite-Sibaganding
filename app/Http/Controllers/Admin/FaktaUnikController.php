<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaktaUnik;
use Illuminate\Http\Request;

class FaktaUnikController extends Controller
{
    public function index()
    {
        $faktas = FaktaUnik::orderBy('nomor', 'asc')->paginate(10);

        return view('admin.fakta-unik.index', compact('faktas'));
    }

    public function create()
    {
        return view('admin.fakta-unik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:10',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tag' => 'nullable|string|max:255',
            'x_koordinat' => 'required|numeric|between:0,100',
            'y_koordinat' => 'required|numeric|between:0,100',
            'status' => 'nullable|boolean',
        ]);

        FaktaUnik::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tag' => $request->tag,
            'x_koordinat' => $request->x_koordinat,
            'y_koordinat' => $request->y_koordinat,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.fakta-unik.index')
            ->with('success', 'Titik Fakta Unik berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $fakta = FaktaUnik::findOrFail($id);

        return view('admin.fakta-unik.edit', compact('fakta'));
    }

    public function update(Request $request, $id)
    {
        $fakta = FaktaUnik::findOrFail($id);

        $request->validate([
            'nomor' => 'required|string|max:10',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tag' => 'nullable|string|max:255',
            'x_koordinat' => 'required|numeric|between:0,100',
            'y_koordinat' => 'required|numeric|between:0,100',
            'status' => 'nullable|boolean',
        ]);

        $fakta->update([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tag' => $request->tag,
            'x_koordinat' => $request->x_koordinat,
            'y_koordinat' => $request->y_koordinat,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.fakta-unik.index')
            ->with('success', 'Titik Fakta Unik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $fakta = FaktaUnik::findOrFail($id);
        $fakta->delete();

        return redirect()
            ->route('admin.fakta-unik.index')
            ->with('success', 'Titik Fakta Unik berhasil dihapus.');
    }
}
