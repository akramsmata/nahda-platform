<?php

namespace App\Http\Controllers;

use App\Models\ActivityModel;
use App\Models\ActivityRegistrationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityFrontController extends Controller
{
    public function index()
    {
        $activities = ActivityModel::orderBy('starts_at','desc')->paginate(10);
        return view('activities.index', compact('activities'));
    }

    public function show($id)
    {
        $activity = ActivityModel::findOrFail($id);
        return view('activities.show', compact('activity'));
    }

    public function register(Request $request, $id)
    {
        $activity = ActivityModel::findOrFail($id);
        $user = Auth::user();

        if (!$user) return redirect()->route('login')->with('error','يجب تسجيل الدخول للتسجيل في النشاط');

        // تسجيل جديد بحالة pending
        ActivityRegistrationModel::create([
            'activity_id' => $activity->id,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        return back()->with('success','تم إرسال طلب التسجيل، سيتم مراجعتك من قبل الإدارة.');
    }
}
