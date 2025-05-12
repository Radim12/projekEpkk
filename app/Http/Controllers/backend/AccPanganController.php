<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Pangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccPanganController extends Controller
{
    public function index()
    {
        // Inisialisasi query dasar
        $query = Pangan::query();

        // Cek guard yang digunakan
        if (Auth::guard('web')->check()) {
            // Jika guard web (admin), tampilkan data dengan status disetujui1 dan disetujui2
            $pang1 = Pangan::where('status', 'disetujui1')->count();
            $pang2 = Pangan::where('status', 'disetujui2')->count();

            $data = Pangan::whereIn('status', ['disetujui1', 'disetujui2'])
                ->orderBy('created_at', 'desc')
                ->get();
        } elseif (Auth::guard('pengguna')->check()) {
            // Jika guard pengguna (mobile)
            $user = Auth::guard('pengguna')->user();

            if ($user->id_role == 2) {
                // Jika role kecamatan (2), tampilkan data dari semua desa di kecamatan tersebut
                $pang1 = Pangan::where('id_subdistrict', $user->id_subdistrict)
                    ->where('status', 'proses')
                    ->count();
                $pang2 = Pangan::where('id_subdistrict', $user->id_subdistrict)
                    ->where('status', 'disetujui1')
                    ->count();

                $data = Pangan::where('id_subdistrict', $user->id_subdistrict)
                    ->whereIn('status', ['proses', 'disetujui1'])
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
        }

        return view('backend.accpangan', compact('pang1', 'pang2', 'data'));
    }
}
