<?php

namespace App\Http\Controllers\backend;

use App\Models\Berita;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InputBeritaController extends Controller
{
    public function index(){
        $data = Berita::latest()->paginate();
        return view('backend.input_berita', compact('data'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'file',
        ]);
        if ($request->file('file')) {
        $imageName = $request->file('image')->getClientOriginalName();
        $tujuan_upload = 'storage/berita';
        $request->image->move($tujuan_upload, $imageName);

        $file = $request->file('file');
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();
        $file = $request->file('file')->getClientOriginalName();
        $tujuan_upload = 'storage/berita/file';
        $request->file->move($tujuan_upload, $file);

        Berita::create([
            'image' => $imageName,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file,
        ]);
    }else{
        $imageName = $request->file('image')->getClientOriginalName();
        $tujuan_upload = 'storage/berita';
        $request->image->move($tujuan_upload, $imageName);
        Berita::create([
            'image' => $imageName,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
    }
        return redirect()->route('input_berita.index')->with(['success' => 'Berhasil Menambahkan Berita']);
    }

    public function show(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        $data = Berita::find($id);

        if ($request->file('image') ) {
            $imageName = $request->file('image')->getClientOriginalName();
            $tujuan_upload = 'storage/berita';
            $request->image->move($tujuan_upload, $imageName);

            $data->update([
                'image' => $imageName,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }elseif($request->file('file') ) {
            $file = $request->file('file');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $file = $request->file('file')->getClientOriginalName();
            $tujuan_upload = 'storage/berita';
            $request->file->move($tujuan_upload, $file);

            $data->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file' => $file,
            ]);
        }else{
        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        }
    return redirect()->route('input_berita.index')->with(['success' => 'Berhasil Mengedit Berita']);
    }

    public function edit(string $id)
    {
        $data = Berita::find($id);
        return view('backend.tampil_berita', compact('data'));
    }

    public function destroy(string $id)
    
    {
        
        $data = Berita::find($id);

        $data->delete();

        return redirect()->route('input_berita.index')->with(['success' => 'Berhasil Menghapus Berita']);
    }
}