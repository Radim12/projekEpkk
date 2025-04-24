<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Sandang;
use App\Http\Controllers\Controller;

class AccSandangController extends Controller
{
    public function index(){

        $sand1 = Sandang::where('status', 'proses')->count();
        $sand2 = Sandang::where('status', 'disetujui')->count();
    
        return view('backend.accsandang', compact('sand1', 'sand2'));
    }    

}