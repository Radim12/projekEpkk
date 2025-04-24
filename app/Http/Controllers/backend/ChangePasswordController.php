<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('backend.profile', compact('user'));
    }

    public function update(Request $request, string $id)
    {

        if(!Hash::check($request->currentPassword, auth()->user()->password)) {
            return back()->with('error', 'Kata sandi yang anda masukkan tidak sesuai');
        }

        if($request->newpassword != $request->renewpassword) {
            return back()->with('error', 'Konfirmasi kata sandi anda tidak sesuai');
        }

        auth()->user()->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return redirect()->route('change_password.index')->with(['successs' => 'Berhasil Mengubah Kata Sandi']);
        
    }

}
