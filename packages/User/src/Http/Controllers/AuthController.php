<?php

namespace User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin::login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard'); 
        }
    
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('home');

        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }
    

    public function logout(Request $request)
    {
        if (auth()->guard('admin')->check()) {
            auth()->guard('admin')->logout();
        } elseif (auth()->guard('user')->check()) {
            auth()->guard('user')->logout();
        }
    
        // Xóa dữ liệu session và tạo lại token để bảo mật
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
    

    public function dashboard()
    {
        $title = "trang chu";
        $user = auth('admin')->user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Bạn chưa đăng nhập. Vui lòng đăng nhập.');
        }

        return view('admin.dashboard', compact('user', 'title'));
    }
}
