<?php

namespace App\Http\Controllers\backend;

use App\Models\Perumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPerumahanController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_perumahan')
        ->join('penggunas', 'laporan_perumahan.id_user', '=', 'penggunas.id')
        ->select('laporan_perumahan.*', 'penggunas.nama_kec')
        ->where('laporan_perumahan.status', 'disetujui')
        ->orderBy('id_pokja3_bidang3', 'desc')
        ->get();
        return view('backend.decperumahan', compact('data2'));
    }

    public function destroy(string $id_pokja3_bidang3)
    {
        
        $data2 = Perumahan::find($id_pokja3_bidang3);

        $data2->delete();

        return redirect()->route('decperumahan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
