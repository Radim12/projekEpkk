<?php

namespace App\Http\Controllers\backend;

use App\Models\BidangUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecBidangUmumController extends Controller
{
    public function index() {
        $data = DB::table('laporan_umum')
        ->join('penggunas', 'laporan_umum.id_user', '=', 'penggunas.id')
        ->select('laporan_umum.*', 'penggunas.nama_kec')
        ->where('laporan_umum.status', 'disetujui')
        ->orderBy('id_laporan_umum', 'desc')
        ->get();
        
        return view('backend.decbidangumum', compact('data'));
    }

    public function destroy(string $id_laporan_umum)
    {
        
        $data = BidangUmum::find($id_laporan_umum);

        $data->delete();

        return redirect()->route('decbidangumum.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
