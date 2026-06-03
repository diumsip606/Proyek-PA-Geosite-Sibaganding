<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
 
class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);
        return view('admin.pesan.index', compact('pesans'));
    }
 
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan.show', compact('pesan'));
    }
 
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();
 
        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
