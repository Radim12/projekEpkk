<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja4;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanPokja4Controller extends Controller
{
    public function index() {
        $data = DB::table('laporan_kader_pokja4')
        ->join('penggunas', 'laporan_kader_pokja4.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja4.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja4.status', 'proses')
        ->orderBy('id_kader_pokja4', 'desc')
        ->get();
        return view('backend.laporanpokja4', compact('data'));
    }

    public function edit(string $id_kader_pokja4)
    {
        $data = LaporanPokja4::find($id_kader_pokja4);
        return view('backend.tampil_laporanpokja4', compact('data'));
    }
    public function update(Request $request, string $id_kader_pokja4)
    {
        $data = LaporanPokja4::find($id_kader_pokja4);
            $data->update([
                'posyandu' => $request->posyandu,
                'gizi' => $request->gizi,
                'kesling' => $request->kesling,
                'penyuluhan_narkoba' => $request->penyuluhan_narkoba,
                'PHBS' => $request->PHBS,
                'KB' => $request->KB,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('laporanpokja4.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_kader_pokja4)
    {
        
        $data = LaporanPokja4::find($id_kader_pokja4);

        $data->delete();

        return redirect()->route('laporanpokja4.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
