<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Sandang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccSandangController extends Controller
{
    public function index()
    {
        // Cek guard yang login
        if (Auth::guard('web')->check()) {
            // Jika admin web, tampilkan data dengan status disetujui1 dan disetujui2
            $sand1 = Sandang::where('status', 'disetujui1')->count();
            $sand2 = Sandang::where('status', 'disetujui2')->count();
        } elseif (Auth::guard('pengguna')->check()) {
            // Jika pengguna mobile
            $user = Auth::guard('pengguna')->user();

            if ($user->id_role == 2) { // Kecamatan (role 2)
                // Ambil data dari desa (role 1) di kecamatan yang sama
                $sand1 = Sandang::whereHas('user', function ($query) use ($user) {
                    $query->where('id_role', 1)
                        ->where('id_subdistrict', $user->id_subdistrict);
                })->where('status', 'proses')->count();

                $sand2 = Sandang::whereHas('user', function ($query) use ($user) {
                    $query->where('id_role', 1)
                        ->where('id_subdistrict', $user->id_subdistrict);
                })->where('status', 'disetujui1')->count();
            }
        } else {
            // Default jika tidak ada guard yang cocok
            $sand1 = 0;
            $sand2 = 0;
        }

        return view('backend.accsandang', compact('sand1', 'sand2'));
    }
}