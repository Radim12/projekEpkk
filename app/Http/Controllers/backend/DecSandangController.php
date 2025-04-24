<?php

namespace App\Http\Controllers\backend;

use App\Models\Sandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecSandangController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_sandang')
        ->join('penggunas', 'laporan_sandang.id_user', '=', 'penggunas.id')
        ->select('laporan_sandang.*', 'penggunas.nama_kec')
        ->where('laporan_sandang.status', 'disetujui')
        ->orderBy('id_pokja3_bidang2', 'desc')
        ->get();
        return view('backend.decsandang', compact('data2'));
    }

    public function destroy(string $id_pokja3_bidang2)
    {
        
        $data2 = Sandang::find($id_pokja3_bidang2);

        $data2->delete();

        return redirect()->route('decsandang.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
