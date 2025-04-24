<?php

namespace App\Http\Controllers\backend;

use App\Models\Perumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerumahanController extends Controller
{
    public function index() {
        $data = DB::table('laporan_perumahan')
        ->join('penggunas', 'laporan_perumahan.id_user', '=', 'penggunas.id')
        ->select('laporan_perumahan.*', 'penggunas.nama_kec')
        ->where('laporan_perumahan.status', 'proses')
        ->orderBy('id_pokja3_bidang3', 'desc')
        ->get();
        return view('backend.perumahan', compact('data'));
    }

    public function edit(string $id_pokja3_bidang3)
    {
        $data = Perumahan::find($id_pokja3_bidang3);
        return view('backend.tampil_perumahan', compact('data'));
    }
    public function update(Request $request, string $id_pokja3_bidang3)
    {
        $data = Perumahan::find($id_pokja3_bidang3);
            $data->update([
                'layak_huni' => $request->layak_huni,
                'tidak_layak' => $request->tidak_layak,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('perumahan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_pokja3_bidang3)
    {
        
        $data = Perumahan::find($id_pokja3_bidang3);

        $data->delete();

        return redirect()->route('perumahan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
