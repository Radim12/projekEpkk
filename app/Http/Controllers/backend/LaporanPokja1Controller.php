<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanPokja1Controller extends Controller
{
    public function index() {
        $data = DB::table('laporan_kader_pokja1')
        ->join('penggunas', 'laporan_kader_pokja1.id_user', '=', 'penggunas.id')
        ->select('laporan_kader_pokja1.*', 'penggunas.nama_kec')
        ->where('laporan_kader_pokja1.status', 'proses')
        ->orderBy('id_kader_pokja1', 'desc')
        ->get();
        return view('backend.laporanpokja1', compact('data'));
    }

    public function edit(string $id_kader_pokja1)
    {
        $data = LaporanPokja1::find($id_kader_pokja1);
        return view('backend.tampil_laporanpokja1', compact('data'));
    }
    public function update(Request $request, string $id_kader_pokja1)
    {
        $data = LaporanPokja1::find($id_kader_pokja1);
            $data->update([
                'PKBN' => $request->PKBN,
                'PKDRT' => $request->PKDRT,
                'pola_asuh' => $request->pola_asuh,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('laporanpokja1.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_kader_pokja1)
    {
        
        $data = LaporanPokja1::find($id_kader_pokja1);

        $data->delete();

        return redirect()->route('laporanpokja1.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
