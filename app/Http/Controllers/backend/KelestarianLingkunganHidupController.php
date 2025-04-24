<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KelestarianLingkunganHidup;

class KelestarianLingkunganHidupController extends Controller
{
    public function index() {
        $kelestarian1 = DB::table('laporan_kelestarian_lingkungan_hidup')
        ->join('penggunas', 'laporan_kelestarian_lingkungan_hidup.id_user', '=', 'penggunas.id')
        ->select('laporan_kelestarian_lingkungan_hidup.*', 'penggunas.nama_kec')
        ->where('laporan_kelestarian_lingkungan_hidup.status', 'proses')
        ->orderBy('id_kelpangan', 'desc')
        ->get();
        return view('backend.kelestarian_lingkungan_hidup', compact('kelestarian1'));
    }
    public function edit(string $id_kelpangan)
    {
        $data = KelestarianLingkunganHidup::find($id_kelpangan);
        return view('backend.tampil_kelestarian_lingkungan_hidup', compact('data'));
    }
    public function update(Request $request, string $id_kelpangan)
    {
        $data = KelestarianLingkunganHidup::find($id_kelpangan);
            $data->update([
                'jamban' => $request->jamban,
                'spal' => $request->spal,
                'tps' => $request->tps,
                'mck' => $request->mck,
                'pdam' => $request->pdam,
                'sumur' => $request->sumur,
                'dll' => $request->dll,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('kelestarian_lingkungan_hidup.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_kelpangan)
    {
        
        $data = KelestarianLingkunganHidup::find($id_kelpangan);

        $data->delete();

        return redirect()->route('kelestarian_lingkungan_hidup.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
