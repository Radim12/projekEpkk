<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Penghayatan;
use App\Http\Controllers\Controller;

class AccPenghayatanController extends Controller
{
    public function index(){

        $peng1 = Penghayatan::where('status', 'proses')->count();
        $peng2 = Penghayatan::where('status', 'disetujui')->count();
    
        return view('backend.accpenghayatan', compact('peng1', 'peng2'));
    }    

}