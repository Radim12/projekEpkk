<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PendidikanController extends Controller
{
    public function index() {
        $data = DB::table('laporan_pendidikan_n_keterampilan')
        ->join('penggunas', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'penggunas.id')
        ->select('laporan_pendidikan_n_keterampilan.*', 'penggunas.nama_kec')
        ->where('laporan_pendidikan_n_keterampilan.status', 'proses')
        ->orderBy('id_pokja2_bidang1', 'desc')
        ->get();

        return view('backend.pendidikan', compact('data'));
    }

    public function edit(string $id_pokja2_bidang1)
    {
        $data = Pendidikan::find($id_pokja2_bidang1);
        return view('backend.tampil_pendidikan', compact('data'));
    }

    public function update(Request $request, string $id_pokja2_bidang1)
    {
        $data = Pendidikan::find($id_pokja2_bidang1);
            $data->update([
                'warga_buta' => $request->warga_buta,
                'kel_belajarA' => $request->kel_belajarA,
                'warga_belajarA' => $request->warga_belajarA,
                'kel_belajarB' => $request->kel_belajarB,
                'warga_belajarB' => $request->warga_belajarB,
                'kel_belajarC' => $request->kel_belajarC,
                'warga_belajarC' => $request->warga_belajarC,
                'kel_belajarKF' => $request->kel_belajarKF,
                'warga_belajarKF' => $request->warga_belajarKF,
                'paud' => $request->paud,
                'taman_bacaan' => $request->taman_bacaan,
                'jumlah_klp' => $request->jumlah_klp,
                'jumlah_ibu_peserta' => $request->jumlah_ibu_peserta,
                'jumlah_ape' => $request->jumlah_ape,
                'jumlah_kel_simulasi' => $request->jumlah_kel_simulasi,
                'KF' => $request->KF,
                'paud_tutor' => $request->paud_tutor,
                'BKB' => $request->BKB,
                'koperasi' => $request->koperasi,
                'ketrampilan' => $request->ketrampilan,
                'LP3PKK' => $request->LP3PKK,
                'TP3PKK' => $request->TP3PKK,
                'damas_pkk' => $request->damas_pkk,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('pendidikan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }

    public function filter(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $pendidikan= Pendidikan::where('tanggal', $bulan)->get(); // Filter data berdasarkan bulan

               if ($request->has('search')) {
            $pendidikan= DB::table('laporan_pendidikan_n_keterampilan')
            ->join('penggunas', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'penggunas.id')
            ->select('laporan_pendidikan_n_keterampilan.*', 'penggunas.nama_kec')
            ->where('laporan_pendidikan_n_keterampilan.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_pendidikan_n_keterampilan.status', 'disetujui')
            ->get();

            $total1 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_buta');
            $total2 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarA');
            $total3 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarA');
            $total4 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarB');
            $total5 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarB');
            $total6 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarC');
            $total7 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarC');
            $total8 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarKF');
            $total9 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarKF');
            $total10 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('paud');
            $total11 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('taman_bacaan');
            $total12 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_klp');
            $total13 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_ibu_peserta');
            $total14 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_ape');
            $total15 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi');
            $total16 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KF');
            $total17 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('paud_tutor');
            $total18 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('BKB');
            $total19 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('koperasi');
            $total20 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('ketrampilan');
            $total21 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('LP3PKK');
            $total22 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('TP3PKK');
            $total23 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('damas_pkk');

         $pengembangan = DB::table('laporan_pengembangan_kehidupan')
         ->join('penggunas', 'laporan_pengembangan_kehidupan.id_user', '=', 'penggunas.id')
         ->select('laporan_pengembangan_kehidupan.*', 'penggunas.nama_kec')
         ->where('laporan_pengembangan_kehidupan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_pengembangan_kehidupan.status', 'disetujui')
         ->get();

         $total24 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_pemula');
         $total25 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_pemula');
         $total26 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_madya');
         $total27 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_madya');
         $total28 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_utama');
         $total29 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_utama');
         $total30 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_mandiri');
         $total31 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_mandiri');
         $total32 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_hukum');
         $total33 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_hukum');
            
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY'); 
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja II')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_pokja2', compact('pendidikan', 'pengembangan', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total13', 'total14', 'total15', 'total16','total17', 'total18', 'total19', 'total20', 'total21', 'total22',  'total23', 'total24', 'total25', 'total26', 'total27', 'total28', 'total29', 'total30', 'total31', 'total32', 'total33', 'formattedDate', 'ketua', 'wakil', 'tanggal'));

        }elseif ($request->has('search2')){
            $pendidikan= DB::table('laporan_pendidikan_n_keterampilan')
            ->join('penggunas', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'penggunas.id')
            ->select('laporan_pendidikan_n_keterampilan.*', 'penggunas.nama_kec')
            ->where('laporan_pendidikan_n_keterampilan.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_pendidikan_n_keterampilan.status', 'disetujui')
            ->get();

            $total1 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_buta');
            $total2 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarA');
            $total3 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarA');
            $total4 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarB');
            $total5 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarB');
            $total6 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarC');
            $total7 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarC');
            $total8 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kel_belajarKF');
            $total9 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warga_belajarKF');
            $total10 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('paud');
            $total11 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('taman_bacaan');
            $total12 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_klp');
            $total13 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_ibu_peserta');
            $total14 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_ape');
            $total15 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi');
            $total16 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('KF');
            $total17 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('paud_tutor');
            $total18 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('BKB');
            $total19 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('koperasi');
            $total20 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('ketrampilan');
            $total21 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('LP3PKK');
            $total22 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('TP3PKK');
            $total23 = Pendidikan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('damas_pkk');

         $pengembangan = DB::table('laporan_pengembangan_kehidupan')
         ->join('penggunas', 'laporan_pengembangan_kehidupan.id_user', '=', 'penggunas.id')
         ->select('laporan_pengembangan_kehidupan.*', 'penggunas.nama_kec')
         ->where('laporan_pengembangan_kehidupan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_pengembangan_kehidupan.status', 'disetujui')
         ->get();

         $total24 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_pemula');
         $total25 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_pemula');
         $total26 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_madya');
         $total27 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_madya');
         $total28 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_utama');
         $total29 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_utama');
         $total30 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_mandiri');
         $total31 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_mandiri');
         $total32 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kelompok_hukum');
         $total33 = Pengembangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_peserta_hukum');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja II')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_pokja2', compact('pendidikan', 'pengembangan', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total13', 'total14', 'total15', 'total16','total17', 'total18', 'total19', 'total20', 'total21', 'total22',  'total23', 'total24', 'total25', 'total26', 'total27', 'total28', 'total29', 'total30', 'total31', 'total32', 'total33', 'formattedDate', 'ketua', 'wakil', 'tanggal'));
        }else{
            
        }
    }

    public function destroy(string $id_pokja2_bidang1)
    {
        
        $data = Pendidikan::find($id_pokja2_bidang1);

        $data->delete();

        return redirect()->route('pendidikan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
