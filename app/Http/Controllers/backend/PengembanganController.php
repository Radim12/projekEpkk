<?php

namespace App\Http\Controllers\backend;

use App\Models\Pengembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PengembanganController extends Controller
{
    public function index() {
        $data = DB::table('laporan_pengembangan_kehidupan')
        ->join('penggunas', 'laporan_pengembangan_kehidupan.id_user', '=', 'penggunas.id')
        ->select('laporan_pengembangan_kehidupan.*', 'penggunas.nama_kec')
        ->where('laporan_pengembangan_kehidupan.status', 'proses')
        ->orderBy('id_pokja2_bidang2', 'desc')
        ->get();

        return view('backend.pengembangan', compact('data'));
    }

    public function edit(string $id_pokja2_bidang2)
    {
        $data = Pengembangan::find($id_pokja2_bidang2);
        return view('backend.tampil_pengembangan', compact('data'));
    }
    public function update(Request $request, string $id_pokja2_bidang2)
    {
        $data = Pengembangan::find($id_pokja2_bidang2);
            $data->update([
                'jumlah_kelompok_pemula' => $request->jumlah_kelompok_pemula,
                'jumlah_peserta_pemula' => $request->jumlah_peserta_pemula,
                'jumlah_kelompok_madya' => $request->jumlah_kelompok_madya,
                'jumlah_peserta_madya' => $request->jumlah_peserta_madya,
                'jumlah_kelompok_utama' => $request->jumlah_kelompok_utama,
                'jumlah_peserta_utama' => $request->jumlah_peserta_utama,
                'jumlah_kelompok_mandiri' => $request->jumlah_kelompok_mandiri,
                'jumlah_peserta_mandiri' => $request->jumlah_peserta_mandiri,
                'jumlah_kelompok_hukum' => $request->jumlah_kelompok_hukum,
                'jumlah_peserta_hukum' => $request->jumlah_peserta_hukum,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('pengembangan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_pokja2_bidang2)
    {
        
        $data = Pengembangan::find($id_pokja2_bidang2);

        $data->delete();

        return redirect()->route('pengembangan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
