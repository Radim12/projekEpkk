<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\GotongRoyong;
use App\Http\Controllers\Controller;

class AccGotongRoyongController extends Controller
{
    public function index(){

        $got1 = GotongRoyong::where('status', 'proses')->count();
        $got2 = GotongRoyong::where('status', 'disetujui')->count();
    
        return view('backend.accgotongroyong', compact('got1', 'got2'));
    }    

}