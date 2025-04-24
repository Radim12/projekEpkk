<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecLaporanPokja1Controller extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_kader_pokja1')
        ->join('penggunas', 'laporan_kader_pokja1.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja1.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja1.status', 'disetujui')
        ->orderBy('id_kader_pokja1', 'desc')
        ->get();
        return view('backend.declaporanpokja1', compact('data2'));
    }

    public function destroy(string $id_kader_pokja1)
    {
        
        $data2 = LaporanPokja1::find($id_kader_pokja1);

        $data2->delete();

        return redirect()->route('declaporanpokja1.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
