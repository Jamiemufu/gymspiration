<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    /**
     * __construct only role admin
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function members()
    {
        return view('admin.home');
    }

    public function reports()
    {
        return view('admin.home');
    }
}
