<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\UsersMobile;

class PendidikanController extends Controller
{
    public function index()
    {
        // Cek guard yang digunakan
        if (Auth::guard('web')->check()) {
            // Jika admin web, tampilkan data dengan status 'disetujui1' dan disetujui2
            $data = DB::table('laporan_pendidikan_n_keterampilan')
                ->join('users_mobile', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'users_mobile.id')
                ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
                ->select('laporan_pendidikan_n_keterampilan.*', 'subdistrict.name as nama_kec')
                ->where('laporan_pendidikan_n_keterampilan.status', ['disetujui1', 'disetujui2'])
                ->orderBy('id_pokja2_bidang1', 'desc')
                ->get();
        } elseif (Auth::guard('pengguna')->check()) {
            // Jika pengguna
            $user = Auth::guard('pengguna')->user();

            if ($user->id_role == 2) {
                // Jika role kecamatan, tampilkan data desa di kecamatan tersebut dengan status 'proses' atau 'disetujui1'
                $data = DB::table('laporan_pendidikan_n_keterampilan')
                    ->join('users_mobile', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'users_mobile.id')
                    ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
                    ->select('laporan_pendidikan_n_keterampilan.*', 'subdistrict.name as nama_kec')
                    ->where('users_mobile.id_subdistrict', $user->id_subdistrict)
                    ->where('users_mobile.id_role', 1) // Hanya desa
                    ->whereIn('laporan_pendidikan_n_keterampilan.status', ['proses', 'disetujui1'])
                    ->orderBy('id_pokja2_bidang1', 'desc')
                    ->get();
            }
        }

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

        // Base query untuk pendidikan
        $pendidikanQuery = DB::table('laporan_pendidikan_n_keterampilan')
            ->join('users_mobile', 'laporan_pendidikan_n_keterampilan.id_user', '=', 'users_mobile.id')
            ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
            ->select('laporan_pendidikan_n_keterampilan.*', 'subdistrict.name as nama_kec');

        // Base query untuk pengembangan
        $pengembanganQuery = DB::table('laporan_pengembangan_kehidupan')
            ->join('users_mobile', 'laporan_pengembangan_kehidupan.id_user', '=', 'users_mobile.id')
            ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
            ->select('laporan_pengembangan_kehidupan.*', 'subdistrict.name as nama_kec');

        // Filter berdasarkan guard dan role
        if (Auth::guard('web')->check()) {
            $pendidikanQuery->where('laporan_pendidikan_n_keterampilan.status', ['disetujui1', 'disetujui2']);
            $pengembanganQuery->where('laporan_pengembangan_kehidupan.status', ['disetujui1', 'disetujui2']);
        } elseif (Auth::guard('pengguna')->check()) {
            $user = Auth::guard('pengguna')->user();

            if ($user->id_role == 2) {
                // Kecamatan - data desa di kecamatan tersebut
                $pendidikanQuery->where('users_mobile.id_subdistrict', $user->id_subdistrict)
                    ->where('users_mobile.id_role', 1);
                $pengembanganQuery->where('users_mobile.id_subdistrict', $user->id_subdistrict)
                    ->where('users_mobile.id_role', 1);
            }

            $pendidikanQuery->whereIn('laporan_pendidikan_n_keterampilan.status', ['proses', 'disetujui1']);
            $pengembanganQuery->whereIn('laporan_pengembangan_kehidupan.status', ['proses', 'disetujui1']);
        }

        if ($request->has('search')) {
            // Filter bulan
            $pendidikanQuery->where('laporan_pendidikan_n_keterampilan.tanggal', 'LIKE', '%' . $request->search . '%');
            $pengembanganQuery->where('laporan_pengembangan_kehidupan.tanggal', 'LIKE', '%' . $request->search . '%');

            $pendidikan = $pendidikanQuery->get();
            $pengembangan = $pengembanganQuery->get();

            // Hitung total untuk pendidikan
            $total1 = $pendidikan->sum('warga_buta');
            $total2 = $pendidikan->sum('kel_belajarA');
            $total3 = $pendidikan->sum('warga_belajarA');
            $total4 = $pendidikan->sum('kel_belajarB');
            $total5 = $pendidikan->sum('warga_belajarB');
            $total6 = $pendidikan->sum('kel_belajarC');
            $total7 = $pendidikan->sum('warga_belajarC');
            $total8 = $pendidikan->sum('kel_belajarKF');
            $total9 = $pendidikan->sum('warga_belajarKF');
            $total10 = $pendidikan->sum('paud');
            $total11 = $pendidikan->sum('taman_bacaan');
            $total12 = $pendidikan->sum('jumlah_klp');
            $total13 = $pendidikan->sum('jumlah_ibu_peserta');
            $total14 = $pendidikan->sum('jumlah_ape');
            $total15 = $pendidikan->sum('jumlah_kel_simulasi');
            $total16 = $pendidikan->sum('KF');
            $total17 = $pendidikan->sum('paud_tutor');
            $total18 = $pendidikan->sum('BKB');
            $total19 = $pendidikan->sum('koperasi');
            $total20 = $pendidikan->sum('ketrampilan');
            $total21 = $pendidikan->sum('LP3PKK');
            $total22 = $pendidikan->sum('TP3PKK');
            $total23 = $pendidikan->sum('damas_pkk');

            // Hitung total untuk pengembangan
            $total24 = $pengembangan->sum('jumlah_kelompok_pemula');
            $total25 = $pengembangan->sum('jumlah_peserta_pemula');
            $total26 = $pengembangan->sum('jumlah_kelompok_madya');
            $total27 = $pengembangan->sum('jumlah_peserta_madya');
            $total28 = $pengembangan->sum('jumlah_kelompok_utama');
            $total29 = $pengembangan->sum('jumlah_peserta_utama');
            $total30 = $pengembangan->sum('jumlah_kelompok_mandiri');
            $total31 = $pengembangan->sum('jumlah_peserta_mandiri');
            $total32 = $pengembangan->sum('jumlah_kelompok_hukum');
            $total33 = $pengembangan->sum('jumlah_peserta_hukum');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja II')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_pokja2', compact(
                'pendidikan',
                'pengembangan',
                'total1',
                'total2',
                'total3',
                'total4',
                'total5',
                'total6',
                'total7',
                'total8',
                'total9',
                'total10',
                'total11',
                'total12',
                'total13',
                'total14',
                'total15',
                'total16',
                'total17',
                'total18',
                'total19',
                'total20',
                'total21',
                'total22',
                'total23',
                'total24',
                'total25',
                'total26',
                'total27',
                'total28',
                'total29',
                'total30',
                'total31',
                'total32',
                'total33',
                'formattedDate',
                'ketua',
                'wakil',
                'tanggal'
            ));
        } elseif ($request->has('search2')) {
            // Filter tahun
            $pendidikanQuery->where('laporan_pendidikan_n_keterampilan.tanggal', 'LIKE', '%' . $request->search2 . '%');
            $pengembanganQuery->where('laporan_pengembangan_kehidupan.tanggal', 'LIKE', '%' . $request->search2 . '%');

            $pendidikan = $pendidikanQuery->get();
            $pengembangan = $pengembanganQuery->get();

            // Hitung total untuk pendidikan
            $total1 = $pendidikan->sum('warga_buta');
            $total2 = $pendidikan->sum('kel_belajarA');
            $total3 = $pendidikan->sum('warga_belajarA');
            $total4 = $pendidikan->sum('kel_belajarB');
            $total5 = $pendidikan->sum('warga_belajarB');
            $total6 = $pendidikan->sum('kel_belajarC');
            $total7 = $pendidikan->sum('warga_belajarC');
            $total8 = $pendidikan->sum('kel_belajarKF');
            $total9 = $pendidikan->sum('warga_belajarKF');
            $total10 = $pendidikan->sum('paud');
            $total11 = $pendidikan->sum('taman_bacaan');
            $total12 = $pendidikan->sum('jumlah_klp');
            $total13 = $pendidikan->sum('jumlah_ibu_peserta');
            $total14 = $pendidikan->sum('jumlah_ape');
            $total15 = $pendidikan->sum('jumlah_kel_simulasi');
            $total16 = $pendidikan->sum('KF');
            $total17 = $pendidikan->sum('paud_tutor');
            $total18 = $pendidikan->sum('BKB');
            $total19 = $pendidikan->sum('koperasi');
            $total20 = $pendidikan->sum('ketrampilan');
            $total21 = $pendidikan->sum('LP3PKK');
            $total22 = $pendidikan->sum('TP3PKK');
            $total23 = $pendidikan->sum('damas_pkk');

            // Hitung total untuk pengembangan
            $total24 = $pengembangan->sum('jumlah_kelompok_pemula');
            $total25 = $pengembangan->sum('jumlah_peserta_pemula');
            $total26 = $pengembangan->sum('jumlah_kelompok_madya');
            $total27 = $pengembangan->sum('jumlah_peserta_madya');
            $total28 = $pengembangan->sum('jumlah_kelompok_utama');
            $total29 = $pengembangan->sum('jumlah_peserta_utama');
            $total30 = $pengembangan->sum('jumlah_kelompok_mandiri');
            $total31 = $pengembangan->sum('jumlah_peserta_mandiri');
            $total32 = $pengembangan->sum('jumlah_kelompok_hukum');
            $total33 = $pengembangan->sum('jumlah_peserta_hukum');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja II')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_pokja2', compact(
                'pendidikan',
                'pengembangan',
                'total1',
                'total2',
                'total3',
                'total4',
                'total5',
                'total6',
                'total7',
                'total8',
                'total9',
                'total10',
                'total11',
                'total12',
                'total13',
                'total14',
                'total15',
                'total16',
                'total17',
                'total18',
                'total19',
                'total20',
                'total21',
                'total22',
                'total23',
                'total24',
                'total25',
                'total26',
                'total27',
                'total28',
                'total29',
                'total30',
                'total31',
                'total32',
                'total33',
                'formattedDate',
                'ketua',
                'wakil',
                'tanggal'
            ));
        }

        return redirect()->back();
    }

    public function destroy(string $id_pokja2_bidang1)
    {
        $data = Pendidikan::find($id_pokja2_bidang1);
        $data->delete();
        return redirect()->route('pendidikan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
