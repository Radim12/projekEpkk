<?php

namespace App\Http\Controllers\backend;

use App\Models\BidangUmum;
use App\Models\Ttd;
use App\Models\Ttds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BidangUmumController extends Controller
{
    public function index() {

        $data = DB::table('laporan_umum')
        ->join('penggunas', 'laporan_umum.id_user', '=', 'penggunas.id')
        ->select('laporan_umum.*', 'penggunas.nama_kec')
        ->where('laporan_umum.status', 'proses')
        ->orderBy('id_laporan_umum', 'desc')
        ->get();

        return view('backend.bidangumum', compact('data'));
    }

    public function edit(string $id_laporan_umum)
    {
        $data = BidangUmum::find($id_laporan_umum);
        return view('backend.tampil_bidangumum', compact('data'));
    }
    public function update(Request $request, string $id_laporan_umum)
    {
        $data = BidangUmum::find($id_laporan_umum);
            $data->update([
                'dusun_lingkungan' => $request->dusun_lingkungan,
                'PKK_RW' => $request->PKK_RW,
                'desa_wisma' => $request->desa_wisma,
                'KRT' => $request->KRT,
                'KK' => $request->KK, 
                'jiwa_laki' => $request->jiwa_laki, 
                'jiwa_perempuan' => $request->jiwa_perempuan, 
                'anggota_laki' => $request->anggota_laki, 
                'anggota_perempuan' => $request->anggota_perempuan, 
                'umum_laki' => $request->umum_laki, 
                'umum_perempuan' => $request->umum_perempuan, 
                'khusus_laki' => $request->khusus_laki, 
                'khusus_perempuan' => $request->khusus_perempuan, 
                'honorer_laki' => $request->honorer_laki, 
                'honorer_perempuan' => $request->honorer_perempuan, 
                'bantuan_laki' => $request->bantuan_laki, 
                'bantuan_perempuan' => $request->bantuan_perempuan, 
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('bidangumum.index')->with(['success' => 'Berhasil Mengubah Status']);
    }

    public function filter(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $bidangumum = BidangUmum::where('tanggal', $bulan)->get(); // Filter data berdasarkan bulan

               if ($request->has('search')) {
            $bidangumum = DB::table('laporan_umum')
            ->join('penggunas', 'laporan_umum.id_user', '=', 'penggunas.id')
            ->select('laporan_umum.*', 'penggunas.nama_kec')
            ->where('laporan_umum.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_umum.status', 'disetujui')
            ->get();

            $total1 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('dusun_lingkungan');
            $total2 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKK_RW');
            $total3 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('desa_wisma');
            $total4 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KRT');
            $total5 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KK');
            $total6 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jiwa_laki');
            $total7 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jiwa_perempuan');
            $total8 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('anggota_laki');
            $total9 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('anggota_perempuan');
            $total10 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('umum_laki');
            $total11 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('umum_perempuan');
            $total12 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('khusus_laki');
            $total13 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('khusus_perempuan');
            $total14 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('honorer_laki');
            $total15 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('honorer_perempuan');
            $total16 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('bantuan_laki');
            $total17 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('bantuan_perempuan');
            
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY'); 
            $ketua = Ttd::where('jabatan', 'Sekretaris')->where('pokja', 'Bidang Umum')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_bidangumum', compact('bidangumum', 'total1', 'total2', 'total3', 'total4', 'tanggal', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total13', 'total14', 'total15', 'total16','total17', 'formattedDate', 'ketua', 'wakil'));

        }elseif ($request->has('search2')){
            $bidangumum = DB::table('laporan_umum')
            ->join('penggunas', 'laporan_umum.id_user', '=', 'penggunas.id')
            ->select('laporan_umum.*', 'penggunas.nama_kec')
            ->where('laporan_umum.tanggal', 'LIKE', '%' . $request->search2 . '%')
            ->where('laporan_umum.status', 'disetujui')
            ->get();

            $total1 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('dusun_lingkungan');
            $total2 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKK_RW');
            $total3 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('desa_wisma');
            $total4 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KRT');
            $total5 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KK');
            $total6 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jiwa_laki');
            $total7 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jiwa_perempuan');
            $total8 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('anggota_laki');
            $total9 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('anggota_perempuan');
            $total10 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('umum_laki');
            $total11 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('umum_perempuan');
            $total12 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('khusus_laki');
            $total13 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('khusus_perempuan');
            $total14 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('honorer_laki');
            $total15 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('honorer_perempuan');
            $total16 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('bantuan_laki');
            $total17 = BidangUmum::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('bantuan_perempuan');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Sekretaris')->where('pokja', 'Bidang Umum')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_bidangumum', compact('bidangumum', 'total1', 'total2', 'total3', 'total4', 'tanggal', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total13', 'total14', 'total15', 'total16','total17', 'formattedDate', 'ketua', 'wakil'));
        }else{
            
        }
    }


    public function destroy(string $id_laporan_umum)
    {
        
        $data = BidangUmum::find($id_laporan_umum);

        $data->delete();

        return redirect()->route('bidangumum.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
