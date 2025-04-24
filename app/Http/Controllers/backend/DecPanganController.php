<?php

namespace App\Http\Controllers\backend;

use App\Models\Pangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPanganController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_pangan')
        ->join('penggunas', 'laporan_pangan.id_user', '=', 'penggunas.id')
        ->select('laporan_pangan.*', 'penggunas.nama_kec')
        ->where('laporan_pangan.status', 'disetujui')
        ->orderBy('id_pokja3_bidang1', 'desc')
        ->get();
        return view('backend.decpangan', compact('data2'));
    }

    public function destroy(string $id_pokja3_bidang1)
    {
        
        $data2 = Pangan::find($id_pokja3_bidang1);

        $data2->delete();

        return redirect()->route('decpangan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
