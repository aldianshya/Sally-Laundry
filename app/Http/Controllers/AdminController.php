<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        return view('admin.index'); // pastikan file view-nya ada di resources/views/admin/index.blade.php
    }
}
