<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\PerencanaanSehat;
use App\Http\Controllers\Controller;

class AccperencanaanController extends Controller
{
    public function index(){

        $per1 = PerencanaanSehat::where('status', 'proses')->count();
        $per2 = PerencanaanSehat::where('status', 'disetujui')->count();

        return view('backend.accperencanaan', compact('per1', 'per2'));
    }

}