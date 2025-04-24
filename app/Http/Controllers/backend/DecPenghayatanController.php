<?php

namespace App\Http\Controllers\backend;

use App\Models\Penghayatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPenghayatanController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_penghayatan_n_pengamalan')
        ->join('penggunas', 'laporan_penghayatan_n_pengamalan.id_user', '=', 'penggunas.id')
        ->select('laporan_penghayatan_n_pengamalan.*', 'penggunas.nama_kec')
        ->where('laporan_penghayatan_n_pengamalan.status', 'disetujui')
        ->orderBy('id_pokja1_bidang1', 'desc')
        ->get();
        return view('backend.decpenghayatan', compact('data2'));
    }

    public function destroy(string $id_pokja1_bidang1)
    {
        
        $data2 = Penghayatan::find($id_pokja1_bidang1);

        $data2->delete();

        return redirect()->route('decpenghayatan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
