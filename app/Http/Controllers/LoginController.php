<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;

// use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) 
        {
            return redirect()->intended ("beranda");
        }
        return view("landing_page.login");
        
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                "email" => "required",
                "password" => "required",
            ],
            [
                "email.required" => "Email tidak boleh kosong",
                "password.required" => "Password tidak boleh kosong",
            ]
        );

        // kredensial = memastikan email dan password benar
        $kredensial = $request->only("email", "password");

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            if ($user) {
                // Alert::success('Berhasil', 'Anda Berhasil Login');
                return redirect()->intended("beranda");
            }

            return redirect()->intended("/home");
        }

        return back()
            ->withErrors([
                "email" => "Maaf email atau password anda salah",
            ])
            ->onlyInput("email");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
}
