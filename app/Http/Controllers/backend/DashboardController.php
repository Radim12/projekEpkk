<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\BidangUmum;
use App\Models\GotongRoyong;
use App\Models\Penghayatan;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use App\Models\Pangan;
use App\Models\Sandang;
use App\Models\Perumahan;
use App\Models\LaporanPokja1;
use App\Models\LaporanPokja3;
use App\Models\LaporanPokja4;
use App\Models\Kesehatan;
use App\Models\KelestarianLingkunganHidup;
use App\Models\PerencanaanSehat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah user berdasarkan guard yang login
        if (Auth::guard('pengguna')->check()) {
            // Jika guard pengguna (kecamatan/role 2)
            $loggedInUser = Auth::guard('pengguna')->user();

            // Hitung user desa (role 1) di kecamatan yang sama
            $jmlh_user = Pengguna::where('id_role', 1)
                ->where('id_subdistrict', $loggedInUser->id_subdistrict)
                ->count();
        } else {
            // Jika guard web, hitung semua user mobile
            $jmlh_user = Pengguna::count();
        }

        // Helper function to get filtered query based on guard
        $getFilteredQuery = function ($model) {
            if (Auth::guard('pengguna')->check()) {
                $user = Auth::guard('pengguna')->user();
                $userId = $user->id;
                $userRole = $user->id_role;
                $subdistrictId = $user->id_subdistrict;

                if ($userRole == 1) { // Desa
                    return $model->where('id_user', $userId);
                } elseif ($userRole == 2) { // Kecamatan
                    $desaIds = Pengguna::where('id_subdistrict', $subdistrictId)
                        ->where('id_role', 1)
                        ->pluck('id');
                    return $model->whereIn('id_user', $desaIds);
                }
            }
            return $model;
        };

        // Hitung bidang umum
        $bidangumum = $getFilteredQuery(new BidangUmum())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        // Hitung bidang 1 (Gotong Royong, Penghayatan, Laporan Pokja1)
        $bidang11 = $getFilteredQuery(new GotongRoyong())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang12 = $getFilteredQuery(new Penghayatan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $laporan1 = $getFilteredQuery(new LaporanPokja1())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $totalbidang1 = $bidang11 + $bidang12 + $laporan1;

        // Hitung bidang 2 (Pendidikan, Pengembangan)
        $bidang21 = $getFilteredQuery(new Pendidikan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang22 = $getFilteredQuery(new Pengembangan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $totalbidang2 = $bidang21 + $bidang22;

        // Hitung bidang 3 (Pangan, Sandang, Perumahan, Laporan Pokja3)
        $bidang31 = $getFilteredQuery(new Pangan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang32 = $getFilteredQuery(new Sandang())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang33 = $getFilteredQuery(new Perumahan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $laporan3 = $getFilteredQuery(new LaporanPokja3())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $totalbidang3 = $bidang31 + $bidang32 + $bidang33 + $laporan3;

        // Hitung bidang 4 (Kesehatan, Kelestarian, Perencanaan, Laporan Pokja4)
        $bidang41 = $getFilteredQuery(new Kesehatan())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang42 = $getFilteredQuery(new KelestarianLingkunganHidup())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $bidang43 = $getFilteredQuery(new PerencanaanSehat())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $laporan4 = $getFilteredQuery(new LaporanPokja4())
            ->where(function ($query) {
                $query->where('status', 'disetujui')
                    ->orWhere('status', 'proses');
            })->count();

        $totalbidang4 = $bidang41 + $bidang42 + $bidang43 + $laporan4;

        return view('backend.dashboard', compact(
            'jmlh_user',
            'bidangumum',
            'totalbidang1',
            'totalbidang2',
            'totalbidang3',
            'totalbidang4'
        ));
    }
}