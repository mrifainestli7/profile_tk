<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('admin/home');
            exit();
        } else {
            return redirect('login')->withErrors('Username atau password tidak valid')->withInput();
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}