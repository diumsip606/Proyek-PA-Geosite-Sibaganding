<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;

class FrontendController extends Controller
{
    public function index()
    {
        $umkm = Umkm::latest()->take(3)->get();
        $penginapan = Penginapan::latest()->take(3)->get();

        return view('informasi.index', compact(
            'umkm',
            'penginapan'
        ));
    }
}