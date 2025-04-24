<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja3;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecLaporanPokja3Controller extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_kader_pokja3')
        ->join('penggunas', 'laporan_kader_pokja3.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja3.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja3.status', 'disetujui')
        ->orderBy('id_kader_pokja3', 'desc')
        ->get();
        return view('backend.declaporanpokja3', compact('data2'));
    }

    public function destroy(string $id_kader_pokja3)
    {
        
        $data2 = LaporanPokja3::find($id_kader_pokja3);

        $data2->delete();

        return redirect()->route('declaporanpokja3.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
