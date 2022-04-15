<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('admin.absensi');
    }

    public function create()
    {
        return view('admin.adsensi.create');
    }

    public function edit()
    {
        return view('admin.absensi.edit');
    }
}
