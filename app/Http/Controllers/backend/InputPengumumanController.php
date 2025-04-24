<?php

namespace App\Http\Controllers\backend;

use App\Models\Pengumuman;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class InputPengumumanController extends Controller
{
    public function index(){
        $pengu = Pengumuman::latest()->paginate();
        return view('backend.input_pengumuman', compact('pengu'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'judulPengumuman' => 'required',
            'deskripsiPengumuman' => 'required',
            'tanggalPengumuman' => 'required',
        ]);

        Pengumuman::create([
            'judulPengumuman' => $request->judulPengumuman,
            'deskripsiPengumuman' => $request->deskripsiPengumuman,
            'tempatPengumuman' => $request->tempatPengumuman,
            'tanggalPengumuman' => $request->tanggalPengumuman,

        ]);

        return redirect()->route('input_pengumuman.index')->with(['success' => 'Berhasil Menambahkan Pengumuman']);
    }

    public function show(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {

        $pengu = Pengumuman::find($id);
        $pengu->update([
            'judulPengumuman' => $request->judulPengumuman,
            'deskripsiPengumuman' => $request->deskripsiPengumuman,
            'tempatPengumuman' => $request->tempatPengumuman,
            'tanggalPengumuman' => $request->tanggalPengumuman,
        ]);
        return redirect()->route('input_pengumuman.index')->with(['success' => 'Berhasil Mengedit Pengumuman']);
    }

    public function edit(string $id)
    {
        $pengu = Pengumuman::find($id);
        return view('backend.tampil_pengumuman', compact('pengu'));
    }

    public function destroy(string $id)
    {
        $pengu = Pengumuman::find($id);
        $pengu->delete();
        return redirect()->route('input_pengumuman.index')->with(['success' => 'Berhasil Menghapus Pengumuman']);
    }
}
