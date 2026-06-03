<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakInfo;
use Illuminate\Http\Request;

class KontakInfoController extends Controller
{
    public function index()
    {
        $kontakInfos = KontakInfo::orderBy('tipe')->orderBy('urutan')->paginate(15);
        return view('admin.kontak.index', compact('kontakInfos'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:alamat,telepon,email,sosial_media,jam_operasional',
            'nilai' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $icon = $this->getIconForTipe($request->tipe, $request->nilai, $request->label);

        KontakInfo::create([
            'tipe' => $request->tipe,
            'label' => $request->label,
            'nilai' => $request->nilai,
            'icon' => $icon,
            'urutan' => $request->urutan ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.kontak-info.index')->with('success', 'Info kontak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kontakInfo = KontakInfo::findOrFail($id);
        return view('admin.kontak.edit', compact('kontakInfo'));
    }

    public function update(Request $request, $id)
    {
        $kontakInfo = KontakInfo::findOrFail($id);

        $request->validate([
            'tipe' => 'required|in:alamat,telepon,email,sosial_media,jam_operasional',
            'nilai' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $icon = $this->getIconForTipe($request->tipe, $request->nilai, $request->label);

        $kontakInfo->update([
            'tipe' => $request->tipe,
            'label' => $request->label,
            'nilai' => $request->nilai,
            'icon' => $icon,
            'urutan' => $request->urutan ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.kontak-info.index')->with('success', 'Info kontak berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kontakInfo = KontakInfo::findOrFail($id);
        $kontakInfo->delete();

        return redirect()->route('admin.kontak-info.index')->with('success', 'Info kontak berhasil dihapus!');
    }

    /**
     * Get default Font Awesome icon based on contact info type and value
     */
    protected function getIconForTipe($tipe, $nilai = '', $label = '')
    {
        $tipe = strtolower($tipe);
        $nilai = strtolower($nilai ?? '');
        $label = strtolower($label ?? '');

        if ($tipe === 'alamat') {
            return 'fas fa-map-marker-alt';
        } elseif ($tipe === 'telepon') {
            return 'fas fa-phone-alt';
        } elseif ($tipe === 'email') {
            return 'fas fa-envelope';
        } elseif ($tipe === 'jam_operasional') {
            return 'fas fa-clock';
        } elseif ($tipe === 'sosial_media') {
            if (strpos($nilai, 'facebook') !== false || strpos($label, 'facebook') !== false || strpos($label, 'fb') !== false) {
                return 'fab fa-facebook-f';
            }
            if (strpos($nilai, 'instagram') !== false || strpos($label, 'instagram') !== false || strpos($label, 'ig') !== false) {
                return 'fab fa-instagram';
            }
            if (strpos($nilai, 'twitter') !== false || strpos($nilai, 'x.com') !== false || strpos($label, 'twitter') !== false || strpos($label, 'x') !== false) {
                return 'fab fa-twitter';
            }
            if (strpos($nilai, 'youtube') !== false || strpos($label, 'youtube') !== false || strpos($label, 'yt') !== false) {
                return 'fab fa-youtube';
            }
            if (strpos($nilai, 'tiktok') !== false || strpos($label, 'tiktok') !== false) {
                return 'fab fa-tiktok';
            }
            if (strpos($nilai, 'whatsapp') !== false || strpos($nilai, 'wa.me') !== false || strpos($label, 'whatsapp') !== false || strpos($label, 'wa') !== false) {
                return 'fab fa-whatsapp';
            }
            if (strpos($nilai, 'linkedin') !== false || strpos($label, 'linkedin') !== false) {
                return 'fab fa-linkedin-in';
            }
            if (strpos($nilai, 'telegram') !== false || strpos($label, 'telegram') !== false) {
                return 'fab fa-telegram-plane';
            }
            return 'fas fa-link';
        }

        return 'fas fa-info-circle';
    }
}
