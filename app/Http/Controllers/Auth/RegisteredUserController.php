<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    // عرض نموذج التسجيل للمستخدمين العاديين
    public function create()
    {
        return view('auth.register');
    }

    // معالجة التسجيل وتخزين المستخدم الجديد (دور افتراضي: member)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','confirmed','min:6'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'member', // دائماً عضو عادي للتسجيل الذاتي
        ]);

        // لا نعمل تسجيل تلقائي هنا — يمكن تفعيل التسجيل التلقائي إذا رغبت
        return redirect()->route('login')->with('status', 'تم إنشاء الحساب، يرجى تسجيل الدخول بعد التفعيل (إن وُجِد).');
    }
}
