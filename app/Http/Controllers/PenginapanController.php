<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapans = Penginapan::where('status', true)->latest()->get();
        return view('frontend.umkm.penginapan.index', compact('penginapans'));
    }

    public function show($slug)
    {
        $penginapan = Penginapan::where('slug', $slug)->firstOrFail();
        return view('frontend.umkm.penginapan.show', compact('penginapan'));
    }
}
