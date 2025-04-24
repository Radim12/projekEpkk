<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Pengembangan;
use App\Http\Controllers\Controller;

class AccPengembanganController extends Controller
{
    public function index(){

        $pen1 = Pengembangan::where('status', 'proses')->count();
        $pen2 = Pengembangan::where('status', 'disetujui')->count();
    
        return view('backend.accpengembangan', compact('pen1', 'pen2'));
    }    

}