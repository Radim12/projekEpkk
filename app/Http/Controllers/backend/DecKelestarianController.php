<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KelestarianLingkunganHidup;

class DecKelestarianController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_kelestarian_lingkungan_hidup')
        ->join('penggunas', 'laporan_kelestarian_lingkungan_hidup.id_user', '=', 'penggunas.id')
        ->select('laporan_kelestarian_lingkungan_hidup.*', 'penggunas.nama_kec')
        ->where('laporan_kelestarian_lingkungan_hidup.status', 'disetujui')
        ->orderBy('id_kelpangan', 'desc')
        ->get();
        return view('backend.deckelestarian', compact('data2'));
    }

    public function destroy(string $id_kelpangan)
    {
        
        $data2 = KelestarianLingkunganHidup::find($id_kelpangan);

        $data2->delete();

        return redirect()->route('deckelestarian.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
