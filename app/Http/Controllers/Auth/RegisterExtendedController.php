<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterExtendedController extends Controller
{
    public function show()
    {
        return view('auth.register-member');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:8|confirmed',
            'account_type' => 'required|in:user,journalist',
            'affiliation_office' => 'nullable|string|max:255', // نصا "المكتب الوطني" أو "المكتب الولائي"
        ]);

        $user = User::create([
            'name' => $data['full_name'],
            'email' => $data['email'] ?? null,
            'password' => isset($data['password']) ? bcrypt($data['password']) : bcrypt(uniqid('pwd')),
            'account_type' => $data['account_type'],
            'affiliation_office' => $data['affiliation_office'] ?? null,
            'approval_status' => 'pending',
        ]);

        // أدوار
        if ($data['account_type'] === 'journalist') {
            if (method_exists($user, 'assignRole')) $user->assignRole('journalist');
        } else {
            if (method_exists($user, 'assignRole')) $user->assignRole('member');
        }

        // مباشرة بعد التسجيل نسجّل المستخدم بالدخول تلقائياً ثم نوجهه لإكمال الملف
        Auth::login($user);

        return redirect()->route('profile.complete.show')->with('success','أكمل معلوماتك لتفعيل حسابك.');
    }
}
