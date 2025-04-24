<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Perumahan;
use App\Http\Controllers\Controller;

class AccPerumahanController extends Controller
{
    public function index(){

        $per1 = Perumahan::where('status', 'proses')->count();
        $per2 = Perumahan::where('status', 'disetujui')->count();
    
        return view('backend.accperumahan', compact('per1', 'per2'));
    }    

}