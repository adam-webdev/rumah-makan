<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::get();
        $data = Auth::user()->name;
        return view("dashboard",compact("data","perusahaan"));
    }
}
