<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    

    public function dashboard()
    {
        return view('admin.dashboard'); // Vue du dashboard pour les admins
    }
    
}
