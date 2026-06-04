<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageHeaderController extends Controller
{
    public function index()
    {
        $pageHeaders = PageHeader::orderBy('id')->get();
        return view('admin.page-header.index', compact('pageHeaders'));
    }

    public function edit($id)
    {
        $pageHeader = PageHeader::findOrFail($id);
        return view('admin.page-header.edit', compact('pageHeader'));
    }

    public function update(Request $request, $id)
    {
        $pageHeader = PageHeader::findOrFail($id);

        $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'gambar'   => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
        ]);

        $data = [
            'title'    => $request->title,
            'subtitle' => $request->subtitle,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada di storage
            if ($pageHeader->gambar && Str::startsWith($pageHeader->gambar, 'storage/')) {
                $oldPath = str_replace('storage/', '', $pageHeader->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $file     = $request->file('gambar');
            $filename = time() . '_header_' . $pageHeader->page_name . '.' . $file->getClientOriginalExtension();
            $path     = $file->storeAs('page-headers', $filename, 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $pageHeader->update($data);

        return redirect()->route('admin.page-header.index')
            ->with('success', 'Header halaman "' . $pageHeader->label . '" berhasil diperbarui!');
    }
}
