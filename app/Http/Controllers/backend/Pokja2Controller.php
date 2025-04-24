<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use App\Http\Controllers\Controller;

class Pokja2Controller extends Controller
{
    public function index(){
        $modelPertama = Pendidikan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKedua = Pengembangan::where('status', 'disetujui')->orWhere('status', 'proses')->count();

        return view('backend.pokja2', compact('modelPertama', 'modelKedua'));
    }
}