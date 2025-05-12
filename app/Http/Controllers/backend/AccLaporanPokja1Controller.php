<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\LaporanPokja1;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccLaporanPokja1Controller extends Controller
{
    public function index()
    {
        // Jika yang login adalah pengguna mobile (guard pengguna)
        if (Auth::guard('pengguna')->check()) {
            $user = Auth::guard('pengguna')->user();

            // Jika role user adalah 2 (kecamatan), tampilkan data dari desa (role 1) di kecamatan yang sama
            if ($user->id_role == 2) {
                $lap1 = LaporanPokja1::whereIn('status', ['proses', 'disetujui1'])
                    ->whereHas('user', function ($query) use ($user) {
                        $query->where('id_subdistrict', $user->id_subdistrict)
                            ->where('id_role', 1); // Desa
                    })
                    ->count();

                $lap2 = 0; // Tidak ada lap2 untuk kecamatan
            }
        }
        // Jika yang login adalah admin web
        else {
            $lap1 = LaporanPokja1::where('status', 'disetujui1')->count();
            $lap2 = LaporanPokja1::where('status', 'disetujui2')->count();
        }

        return view('backend.acclaporanpokja1', compact('lap1', 'lap2'));
    }
}
