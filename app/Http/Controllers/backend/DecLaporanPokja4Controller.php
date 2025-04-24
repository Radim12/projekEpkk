<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja4;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecLaporanPokja4Controller extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_kader_pokja4')
        ->join('penggunas', 'laporan_kader_pokja4.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja4.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja4.status', 'disetujui')
        ->orderBy('id_kader_pokja4', 'desc')
        ->get();
        return view('backend.declaporanpokja4', compact('data2'));
    }

    public function destroy(string $id_kader_pokja4)
    {
        
        $data2 = LaporanPokja4::find($id_kader_pokja4);

        $data2->delete();

        return redirect()->route('declaporanpokja4.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
