<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Pengembangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccPengembanganController extends Controller
{
    public function index()
    {
        // Cek guard pengguna
        if (Auth::guard('web')->check()) {
            // Jika admin web, tampilkan data dengan status disetujui1 dan disetujui2
            $pengembangan = Pengembangan::whereIn('status', ['disetujui1', 'disetujui2'])
                ->orderBy('created_at', 'desc')
                ->get();

            $pen1 = Pengembangan::where('status', 'disetujui1')->count();
            $pen2 = Pengembangan::where('status', 'disetujui2')->count();
        } elseif (Auth::guard('users_mobile')->check()) {
            $user = Auth::guard('users_mobile')->user();

            // Jika pengguna mobile dengan role 2 (kecamatan)
            if ($user->id_role == 2) {
                // Ambil data dari desa (role 1) di kecamatan yang sama
                $pengembangan = Pengembangan::whereHas('user', function ($query) use ($user) {
                    $query->where('id_role', 1)
                        ->where('id_subdistrict', $user->id_subdistrict);
                })
                    ->whereIn('status', ['proses', 'disetujui1'])
                    ->orderBy('created_at', 'desc')
                    ->get();

                $pen1 = Pengembangan::whereHas('user', function ($query) use ($user) {
                    $query->where('id_role', 1)
                        ->where('id_subdistrict', $user->id_subdistrict);
                })
                    ->where('status', 'proses')
                    ->count();

                $pen2 = Pengembangan::whereHas('user', function ($query) use ($user) {
                    $query->where('id_role', 1)
                        ->where('id_subdistrict', $user->id_subdistrict);
                })
                    ->where('status', 'disetujui1')
                    ->count();
            }
        }

        return view('backend.accpengembangan', compact('pengembangan', 'pen1', 'pen2'));
    }
}
