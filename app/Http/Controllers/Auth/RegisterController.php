<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // معالجة تسجيل الدخول (route name: login.submit)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // تحقق واعتراض المستخدم غير الموافق (approval_status != approved)
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if (property_exists($user, 'approval_status') && $user->approval_status !== 'approved') {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'حسابك لم يتم تفعيله بعد.']);
            }

            // بعد الدخول أرسله إلى الصفحة الرئيسية أو ملفه
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email' => 'بيانات الدخول خاطئة'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
