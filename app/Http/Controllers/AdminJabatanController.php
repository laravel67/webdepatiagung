<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminJabatanController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Data Jabatan & Bidang');
    }

    public function index()
    {
        return view('dashboard.jabatan');
    }
}
