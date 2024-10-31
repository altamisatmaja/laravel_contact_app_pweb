<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        return view('admin.user');
    }

    // public function list_user(){
    //     return view('admin.pages.user.index');
    // }
}
