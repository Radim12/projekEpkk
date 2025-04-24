<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja3;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanPokja3Controller extends Controller
{
    public function index() {
        $data = DB::table('laporan_kader_pokja3')
        ->join('penggunas', 'laporan_kader_pokja3.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja3.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja3.status', 'proses')
        ->orderBy('id_kader_pokja3', 'desc')
        ->get();
        return view('backend.laporanpokja3', compact('data'));
    }

    public function edit(string $id_kader_pokja3)
    {
        $data = LaporanPokja3::find($id_kader_pokja3);
        return view('backend.tampil_laporanpokja3', compact('data'));
    }
    public function update(Request $request, string $id_kader_pokja3)
    {
        $data = LaporanPokja3::find($id_kader_pokja3);
            $data->update([
                'pangan' => $request->pangan,
                'sandang' => $request->sandang,
                'tata_laksana_rumah' => $request->tata_laksana_rumah,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('laporanpokja3.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_kader_pokja3)
    {
        
        $data = LaporanPokja3::find($id_kader_pokja3);

        $data->delete();

        return redirect()->route('laporanpokja3.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
