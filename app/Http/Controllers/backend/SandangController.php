<?php

namespace App\Http\Controllers\backend;

use App\Models\Sandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SandangController extends Controller
{
    public function index() {
        $data = DB::table('laporan_sandang')
        ->join('penggunas', 'laporan_sandang.id_user', '=', 'penggunas.id')
        ->select('laporan_sandang.*', 'penggunas.nama_kec')
        ->where('laporan_sandang.status', 'proses')
        ->orderBy('id_pokja3_bidang2', 'desc')
        ->get();
        return view('backend.sandang', compact('data'));
    }

    public function edit(string $id_pokja3_bidang2)
    {
        $data = Sandang::find($id_pokja3_bidang2);
        return view('backend.tampil_sandang', compact('data'));
    }
    public function update(Request $request, string $id_pokja3_bidang2)
    {
        $data = Sandang::find($id_pokja3_bidang2);
            $data->update([
                'pangan' => $request->pangan,
                'sandang' => $request->sandang,
                'jasa' => $request->jasa,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('sandang.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    public function destroy(string $id_pokja3_bidang2)
    {
        
        $data = Sandang::find($id_pokja3_bidang2);

        $data->delete();

        return redirect()->route('sandang.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
