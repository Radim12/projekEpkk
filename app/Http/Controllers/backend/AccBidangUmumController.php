<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\BidangUmum;
use App\Http\Controllers\Controller;

class AccBidangUmumController extends Controller
{
    public function index(){

        $got1 = BidangUmum::where('status', 'proses')->count();
        $got2 = BidangUmum::where('status', 'disetujui')->count();
    
        return view('backend.accbidangumum', compact('got1', 'got2'));
    }    

}