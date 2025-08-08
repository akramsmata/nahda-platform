<?php

namespace App\Http\Controllers;

use App\Models\JournalistModel;

class JournalistController extends Controller
{
    public function index()
    {
        $journalists = JournalistModel::with('wilaya')->get();
        return response()->json($journalists);
    }
}
