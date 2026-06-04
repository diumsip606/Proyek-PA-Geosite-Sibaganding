<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->get();

        return view('frontend.umkm.index', compact('umkms'));
    }

    public function show($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();

        return view('frontend.umkm.show', compact('umkm'));
    }
}