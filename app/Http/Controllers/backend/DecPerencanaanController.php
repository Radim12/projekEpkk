<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\PerencanaanSehat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecPerencanaanController extends Controller
{
    public function index() {
        $data2 = DB::table('laporan_perencanaan_sehat')
        ->join('penggunas', 'laporan_perencanaan_sehat.id_user', '=', 'penggunas.id')
        ->select('laporan_perencanaan_sehat.*', 'penggunas.nama_kec')
        ->where('laporan_perencanaan_sehat.status', 'disetujui')
        ->orderBy('id_p_sehat', 'desc')
        ->get();
        return view('backend.decperencanaan', compact('data2'));
    }

    public function destroy(string $id_p_sehat)
    {
        
        $data2 = PerencanaanSehat::find($id_p_sehat);

        $data2->delete();

        return redirect()->route('decperencanaan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
