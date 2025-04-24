<?php

namespace App\Http\Controllers\backend;

use App\Models\Penghayatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenghayatanController extends Controller
{
    public function index() {
        $data = DB::table('laporan_penghayatan_n_pengamalan')
        ->join('penggunas', 'laporan_penghayatan_n_pengamalan.id_user', '=', 'penggunas.id')
        ->select('laporan_penghayatan_n_pengamalan.*', 'penggunas.nama_kec')
        ->where('laporan_penghayatan_n_pengamalan.status', 'proses')
        ->orderBy('id_pokja1_bidang1', 'desc')
        ->get();
        return view('backend.penghayatan', compact('data'));
    }


    public function edit(string $id_pokja1_bidang1)
    {
        $data = Penghayatan::find($id_pokja1_bidang1);
        return view('backend.tampil_penghayatan', compact('data'));
    }
    public function update(Request $request, string $id_pokja1_bidang1)
    {
        $data = Penghayatan::find($id_pokja1_bidang1);
            $data->update([
                'jumlah_kel_simulasi1' => $request->jumlah_kel_simulasi1,
                'jumlah_anggota1' => $request->jumlah_anggota1,
                'jumlah_kel_simulasi2' => $request->jumlah_kel_simulasi2,
                'jumlah_anggota2' => $request->jumlah_anggota2,
                'jumlah_kel_simulasi3' => $request->jumlah_kel_simulasi3,
                'jumhlah_anggota3' => $request->jumhlah_anggota3,
                'jumlah_kel_simulasi4' => $request->jumlah_kel_simulasi4,
                'jumlah_anggota4' => $request->jumlah_anggota4,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('penghayatan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_pokja1_bidang1)
    {
        
        $data = Penghayatan::find($id_pokja1_bidang1);

        $data->delete();

        return redirect()->route('penghayatan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
