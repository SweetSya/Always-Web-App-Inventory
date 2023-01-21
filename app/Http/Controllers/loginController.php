<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class loginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login() {
        if(Auth::check()) {
            return back();
        }
        return view('sections.login.main');
    }

    public function actionlogin(Request $r) {
        $data1 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'admin'
        ];
        $data2 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'operator'
        ];
        $data3 = [
            'email' => $r->input('email'),
            'password' => $r->input('password'),
            'role' => 'gudang'
        ];
        if(Auth::attempt($data1)) {
            return response()->json(['success', '']);
        }
        if(Auth::attempt($data2)) {
            return response()->json(['success', 'transaksi']);
        }
        if(Auth::attempt($data3)) {
            return response()->json(['success', 'gudang']);
        }

        return response()->json(['failed']);
    }

    public function logout() {
        Auth::logout();
        return redirect('login')->with('success', 'Succesfully Logged out!');
    }

    public function postregistrasi($name, $email, $password, $role) {
        User::create([
            'name' => $name,
            'role' => $role,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        
        return response()->json(['success']);
    } 
}