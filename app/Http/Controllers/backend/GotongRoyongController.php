<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Penghayatan;
use App\Models\GotongRoyong;
use Illuminate\Http\Request;
use App\Models\LaporanPokja1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GotongRoyongController extends Controller
{
    public function index()
    {
        // Cek guard yang login
        if (Auth::guard('web')->check()) {
            // Admin web - tampilkan data dengan status 'disetujui'
            $data = DB::table('laporan_gotong_royong')
                ->join('users_mobile', 'laporan_gotong_royong.id_user', '=', 'users_mobile.id')
                ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
                ->select('laporan_gotong_royong.*', 'subdistrict.name as nama_kec')
                ->where('laporan_gotong_royong.status', 'disetujui1')
                ->orderBy('id_pokja1_bidang2', 'desc')
                ->get();
        } elseif (Auth::guard('pengguna')->check()) {
            // Pengguna mobile - cek role
            $user = Auth::guard('pengguna')->user();

            if ($user->id_role == 2) { // Kecamatan
                // Ambil data desa (role 1) di kecamatan yang sama
                $data = DB::table('laporan_gotong_royong')
                    ->join('users_mobile as desa', 'laporan_gotong_royong.id_user', '=', 'desa.id')
                    ->join('users_mobile as kecamatan', function ($join) use ($user) {
                        $join->on('desa.id_subdistrict', '=', 'kecamatan.id_subdistrict')
                            ->where('kecamatan.id', '=', $user->id);
                    })
                    ->join('subdistrict', 'desa.id_subdistrict', '=', 'subdistrict.id')
                    ->join('village', 'desa.id_village', '=', 'village.id')
                    ->select('laporan_gotong_royong.*', 'subdistrict.name as nama_kec', 'village.name as nama_desa')
                    ->where('laporan_gotong_royong.status', 'proses')
                    ->where('desa.id_role', 1) // Hanya desa
                    ->orderBy('id_pokja1_bidang2', 'desc')
                    ->get();
            } else {
                // Role lainnya (jika ada)
                $data = collect(); // Kembalikan collection kosong
            }
        } else {
            $data = collect(); // Untuk guard lainnya
        }

        return view('backend.gotongroyong', compact('data'));
    }

    public function edit(string $id_pokja1_bidang2)
    {
        $data = GotongRoyong::find($id_pokja1_bidang2);
        return view('backend.tampil_gotongroyong', compact('data'));
    }

    public function update(Request $request, string $id_pokja1_bidang2)
    {
        $data = GotongRoyong::find($id_pokja1_bidang2);
        $data->update([
            'kerja_bakti' => $request->kerja_bakti,
            'rukun_kematian' => $request->rukun_kematian,
            'keagamaan' => $request->keagamaan,
            'jimpitan' => $request->jimpitan,
            'arisan' => $request->arisan,
            'id_user' => $request->id_user,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'updated_at' => now(), // Gunakan timestamp saat ini
        ]);

        return redirect()->route('gotongroyong.index')->with(['success' => 'Berhasil Mengubah Status']);
    }

    public function filter(Request $request)
    {
        // Filter untuk admin web saja (status disetujui)
        if (!Auth::guard('web')->check()) {
            abort(403, 'Unauthorized action.');
        }

        $query = DB::table('laporan_gotong_royong')
            ->join('users_mobile', 'laporan_gotong_royong.id_user', '=', 'users_mobile.id')
            ->join('subdistrict', 'users_mobile.id_subdistrict', '=', 'subdistrict.id')
            ->select('laporan_gotong_royong.*', 'subdistrict.name as nama_kec')
            ->where('laporan_gotong_royong.status', 'disetujui');

        if ($request->has('search')) {
            // Filter bulan
            $query->where('laporan_gotong_royong.created_at', 'LIKE', '%' . $request->search . '%');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggalFormatted = $carbonDate->isoFormat('MMMM YYYY');

            $view = 'backend.cetak_bulan_pokja1';
        } elseif ($request->has('search2')) {
            // Filter tahun
            $query->whereYear('laporan_gotong_royong.created_at', $request->search2);
            $tanggalFormatted = $request->input('search2');

            $view = 'backend.cetak_tahun_pokja1';
        } else {
            return redirect()->back();
        }

        $gotongroyong = $query->get();

        // Hitung total
        $total5 = $gotongroyong->sum('kerja_bakti');
        $total6 = $gotongroyong->sum('rukun_kematian');
        $total7 = $gotongroyong->sum('keagamaan');
        $total8 = $gotongroyong->sum('jimpitan');
        $total9 = $gotongroyong->sum('arisan');

        // Data tambahan untuk view
        $currentDate = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
        $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja I')->get();
        $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

        return view($view, compact(
            'gotongroyong',
            'total5',
            'total6',
            'total7',
            'total8',
            'total9',
            'currentDate',
            'ketua',
            'wakil',
            'tanggalFormatted'
        ));
    }

    public function destroy(string $id_pokja1_bidang2)
    {
        $data = GotongRoyong::find($id_pokja1_bidang2);
        $data->delete();

        return redirect()->route('gotongroyong.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}