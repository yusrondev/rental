<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/admin/home');
        }else{
            return view('auth/login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/admin/home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/admin/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
