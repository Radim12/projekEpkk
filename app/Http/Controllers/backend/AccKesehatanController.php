<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Kesehatan;
use App\Http\Controllers\Controller;

class AccKesehatanController extends Controller
{
    public function index(){

        $kes1 = Kesehatan::where('status', 'proses')->count();
        $kes2 = Kesehatan::where('status', 'disetujui')->count();
    
        return view('backend.acckesehatan', compact('kes1', 'kes2'));
    }    

}