<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RestaurantController extends Controller
{
    public function home(){
       return view('root.home');
    }
}
