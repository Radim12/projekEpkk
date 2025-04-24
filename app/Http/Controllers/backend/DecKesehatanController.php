<?php

namespace App\Http\Controllers\backend;

use App\Models\Kesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecKesehatanController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_bidang_kesehatan')
        ->join('penggunas', 'laporan_bidang_kesehatan.id_user', '=', 'penggunas.id')
        ->select('laporan_bidang_kesehatan.*', 'penggunas.nama_kec')
        ->where('laporan_bidang_kesehatan.status', 'disetujui')
        ->orderBy('id_laporan_sehat', 'desc')
        ->get();
        return view('backend.deckesehatan', compact('data2'));
    }

    public function destroy(string $id_laporan_sehat)
    {
        
        $data2 = Kesehatan::find($id_laporan_sehat);

        $data2->delete();

        return redirect()->route('deckesehatan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
