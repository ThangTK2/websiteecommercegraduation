<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        //attempt của Laravel để kiểm tra xem thông tin đăng nhập có khớp với bất kỳ người dùng nào trong cơ sở dữ liệu hay không
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', "Đăng nhập thành công");
        }
        return redirect()->route('auth.admin')->with('error', "Email hoặc mật khẩu không đúng");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
