<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Pendidikan;
use App\Http\Controllers\Controller;

class AccPendidikanController extends Controller
{
    public function index(){

        $pend1 = Pendidikan::where('status', 'proses')->count();
        $pend2 = Pendidikan::where('status', 'disetujui')->count();
    
        return view('backend.accpendidikan', compact('pend1', 'pend2'));
    }    

}