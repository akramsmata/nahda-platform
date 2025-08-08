<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WilayaModel;
use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showCompleteForm()
    {
        $wilayas = WilayaModel::orderBy('name')->get();
        return view('auth.complete-profile', compact('wilayas'));
    }

    public function storeCompleteForm(Request $request)
    {
        $data = $request->validate([
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'birth_wilaya_id' => 'nullable|exists:wilayas_table,id',
            'birth_commune' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:100',
            'voter_id' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:users,email,' . auth()->id(),
            'marital_status' => 'nullable|string|max:50',
            'job' => 'nullable|string|max:255',
            'wilaya_id' => 'nullable|exists:wilayas_table,id',
            'photo' => 'nullable|image|max:2048',
            'id_card_image' => 'nullable|image|max:4096',
        ]);

        $user = Auth::user();

        // خزن изображения إن تم رفعها
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members/photos','public');
        }
        if ($request->hasFile('id_card_image')) {
            $data['id_card_image'] = $request->file('id_card_image')->store('members/id_cards','public');
        }

        // تحديث بيانات المستخدم الأساسية إن وُجدت
        if (!empty($data['email'])) {
            $user->email = $data['email'];
        }
        if (!empty($data['phone'])) {
            $user->phone = $data['phone'];
        }
        $user->save();

        // انشئ سجل MemberModel أو حدّثه
        $member = MemberModel::firstOrNew(['id' => $user->id]);
        // لكن لأن members_table قد يكون منفصلًا، نربطه عبر user_id إن أردت. هنا سنملأ الحقول العامة:
        $member->id = $member->id ?? null; // لا نغير الـ id إن كان موجود
        $member->full_name = $user->name;
        $member->father_name = $data['father_name'] ?? null;
        $member->mother_name = $data['mother_name'] ?? null;
        $member->birth_date = $data['birth_date'] ?? null;
        $member->birth_wilaya_id = $data['birth_wilaya_id'] ?? null;
        $member->birth_commune = $data['birth_commune'] ?? null;
        $member->national_id = $data['national_id'] ?? null;
        $member->voter_id = $data['voter_id'] ?? null;
        $member->phone = $data['phone'] ?? $user->phone;
        $member->email = $data['email'] ?? $user->email;
        $member->photo = $data['photo'] ?? $member->photo ?? null;
        $member->id_card_image = $data['id_card_image'] ?? $member->id_card_image ?? null;
        $member->marital_status = $data['marital_status'] ?? null;
        $member->job = $data['job'] ?? null;
        $member->wilaya_id = $data['wilaya_id'] ?? null;
        $member->joined_at = $member->joined_at ?? now();
        $member->save();

        // علّم المستخدم أنه في حالة انتظار الموافقة
        $user->approval_status = 'pending';
        $user->save();

        return redirect()->route('home')->with('success','تم حفظ معلوماتك. ستتم مراجعة طلبك من قبل الإدارة.');
    }

    public function myProfile()
    {
        $user = Auth::user();
        return view('profile.my-profile', compact('user'));
    }
}
