<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityRegistrationModel;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    // قائمة طلبات التسجيل (كلية: للمشرف الوطني يظهر الكل، للمشرف الولائي يظهر فقط ولايته)
    public function registrations(Request $request)
    {
        $user = auth()->user();

        if ($user->isNationalAdmin()) {
            $regs = ActivityRegistrationModel::with('activity','user')->orderBy('created_at','desc')->paginate(20);
        } else if ($user->isWilayaAdmin()) {
            $regs = ActivityRegistrationModel::with('activity','user')
                ->whereHas('user', function($q) use ($user) {
                    $q->where('wilaya_name', $user->wilaya_name);
                })->orderBy('created_at','desc')->paginate(20);
        } else {
            abort(403);
        }

        return view('admin.registrations', compact('regs'));
    }

    // قبول/رفض
    public function updateRegistrationStatus(Request $request, $id)
    {
        $this->validate($request, [
            'action' => 'required|in:accept,reject,toggle_attended'
        ]);

        $reg = ActivityRegistrationModel::findOrFail($id);
        $user = auth()->user();

        // تحقق صلاحيات: الوطني أو ولائي (إن كانت ولاية المطابقة)
        if ($user->isWilayaAdmin() && $reg->user && $reg->user->wilaya_name !== $user->wilaya_name) {
            abort(403);
        }

        if ($request->action == 'accept') {
            $reg->status = 'accepted';
            $reg->save();
        } elseif ($request->action == 'reject') {
            $reg->status = 'rejected';
            $reg->save();
        } elseif ($request->action == 'toggle_attended') {
            $reg->attended = !$reg->attended;
            $reg->save();
        }

        return back()->with('success','تم تحديث الحالة.');
    }

    // قبول عضو (من سجل كـ user)
    public function approveUser(Request $request, $userId)
    {
        $u = User::findOrFail($userId);
        $u->approval_status = 'approved';
        $u->save();

        return back()->with('success','تم قبول المستخدم.');
    }

    public function rejectUser(Request $request, $userId)
    {
        $u = User::findOrFail($userId);
        $u->approval_status = 'rejected';
        $u->save();

        return back()->with('success','تم رفض المستخدم.');
    }
}
