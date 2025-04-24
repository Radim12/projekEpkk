<?php

namespace App\Http\Controllers\backend;

use App\Models\GotongRoyong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecGotongRoyongController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_gotong_royong')
        ->join('penggunas', 'laporan_gotong_royong.id_user', '=', 'penggunas.id')
        ->select('laporan_gotong_royong.*', 'penggunas.nama_kec')
        ->where('laporan_gotong_royong.status', 'disetujui')
        ->orderBy('id_pokja1_bidang2', 'desc')
        ->get();
        
        return view('backend.decgotongroyong', compact('data2'));
    }

    public function destroy(string $id_pokja1_bidang2)
    {
        
        $data2 = GotongRoyong::find($id_pokja1_bidang2);

        $data2->delete();

        return redirect()->route('decgotongroyong.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
