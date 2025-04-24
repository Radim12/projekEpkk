<?php

namespace App\Http\Controllers\backend;

use App\Models\Pengembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPengembanganController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_pengembangan_kehidupan')
        ->join('penggunas', 'laporan_pengembangan_kehidupan.id_user', '=', 'penggunas.id')
        ->select('laporan_pengembangan_kehidupan.*', 'penggunas.nama_kec')
        ->where('laporan_pengembangan_kehidupan.status', 'disetujui')
        ->orderBy('id_pokja2_bidang2', 'desc')
        ->get();

        return view('backend.decpengembangan', compact('data2'));
    }

    public function destroy(string $id_pokja2_bidang2)
    {
        
        $data2 = Pengembangan::find($id_pokja2_bidang2);

        $data2->delete();

        return redirect()->route('decpengembangan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
