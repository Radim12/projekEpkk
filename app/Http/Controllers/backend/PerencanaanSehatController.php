<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\PerencanaanSehat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerencanaanSehatController extends Controller
{
    public function index() {
        $perencanaan_sehat1 = DB::table('laporan_perencanaan_sehat')
        ->join('penggunas', 'laporan_perencanaan_sehat.id_user', '=', 'penggunas.id')
        ->select('laporan_perencanaan_sehat.*', 'penggunas.nama_kec')
        ->where('laporan_perencanaan_sehat.status', 'proses')
        ->orderBy('id_p_sehat', 'desc')
        ->get();

        return view('backend.perencanaan_sehat', compact('perencanaan_sehat1'));
    }
    public function edit(string $id_p_sehat)
    {
        $data = PerencanaanSehat::find($id_p_sehat);
        return view('backend.tampil_perencanaan_sehat', compact('data'));
    }
    public function update(Request $request, string $id_p_sehat)
    {
        $data = PerencanaanSehat::find($id_p_sehat);
            $data->update([
                'J_Psubur' => $request->J_Psubur,
                'J_Wsubur' => $request->J_Wsubur,
                'Kb_p' => $request->Kb_p,
                'Kb_w' => $request->Kb_w,
                'Kk_tbg' => $request->Kk_tbg,
                'id_user' => $request->id_user,    
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('perencanaan_sehat.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_p_sehat)
    {
        
        $data = PerencanaanSehat::find($id_p_sehat);

        $data->delete();

        return redirect()->route('perencanaan_sehat.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
