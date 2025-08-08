<?php

namespace App\Http\Controllers;

use App\Models\NahdaMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = NahdaMember::with('wilaya')->get();
        return response()->json($members);
    }
}
