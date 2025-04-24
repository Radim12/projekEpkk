<?php

namespace App\Http\Controllers\backend;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPendidikanController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_pendidikan_n_keterampilan')
        ->join('penggunas', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'penggunas.id')
        ->select('laporan_pendidikan_n_keterampilan.*', 'penggunas.nama_kec')
        ->where('laporan_pendidikan_n_keterampilan.status', 'disetujui')
        ->orderBy('id_pokja2_bidang1', 'desc')
        ->get();

        return view('backend.decpendidikan', compact('data2'));
    }

    public function destroy(string $id_pokja2_bidang1)
    {
        
        $data2 = Pendidikan::find($id_pokja2_bidang1);

        $data2->delete();

        return redirect()->route('decpendidikan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
