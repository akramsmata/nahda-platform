<?php

namespace App\Http\Controllers;

use App\Models\WilayaModel;

class WilayaController extends Controller
{
    public function index()
    {
        return response()->json(WilayaModel::all());
    }
}
