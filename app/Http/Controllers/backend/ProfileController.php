<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('backend.profile', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'alamat' => 'nullable|string|max:255',
        ], [
            'nomer_telepon.max' => 'Nomer telepon tidak boleh melebihi :max karakter',
            'nomer_telepon.min' => 'Nomer telepon tidak boleh kurang dari :min karakter',
            'alamat.max' => 'Jumlah huruf tidak boleh melebihi :max karakter',
            'name.max' => 'Jumlah huruf tidak boleh melebihi :max karakter',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nomer_telepon = $request->input('nomer_telepon');
        $user->alamat = $request->input('alamat');
        
        $user->save();

        return redirect()->route('profile.index')->with(['success' => 'Berhasil Mengedit Data']);
    }

}
