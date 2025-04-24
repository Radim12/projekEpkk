<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Pangan;
use App\Http\Controllers\Controller;

class AccPanganController extends Controller
{
    public function index(){

        $pang1 = Pangan::where('status', 'proses')->count();
        $pang2 = Pangan::where('status', 'disetujui')->count();
    
        return view('backend.accpangan', compact('pang1', 'pang2'));
    }    

}