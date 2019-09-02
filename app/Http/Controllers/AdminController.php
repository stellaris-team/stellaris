<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct () { $this->middleware('auth'); }

    public function overview () { return view('admin.pages.overview'); }
    
    public function users () { return view('admin.pages.users'); }
}
