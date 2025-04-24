<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\KelestarianLingkunganHidup;
use App\Http\Controllers\Controller;

class AccKelestarianController extends Controller
{
    public function index(){

        $kel1 = KelestarianLingkunganHidup::where('status', 'proses')->count();
        $kel2 = KelestarianLingkunganHidup::where('status', 'disetujui')->count();

        return view('backend.acckelestarian', compact('kel1', 'kel2'));
    }

}