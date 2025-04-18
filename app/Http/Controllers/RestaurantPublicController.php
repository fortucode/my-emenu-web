<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Restaurant;
use App\Models\Combo;
use Carbon\Carbon;
//use App\Models\Plat;
//use App\Models\Promotion;
use Illuminate\Http\Request;

class RestaurantPublicController extends Controller
{
    //
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $profil = Profil::where('id_restaurant', $id)->first();

        //$promotions = \App\Models\Promotion::where('id_restaurant', $id)
        //->where('date_fin', '>=', Carbon::today())
        //->get();
        $plats = \App\Models\Plat::where('id_restaurant', $id)->get();
        $combos = Combo::where('id_restaurant', $id)->get();
        //dd($restaurant, $profil, $promotions, $plats, $combos);

         return view('public.restauran', compact('restaurant', 'profil', 'plats', 'combos'));
        //return view('public.restaurant', compact('restaurant', 'profil'));
    }

    public function liste()
    {
        $restaurants = \App\Models\Restaurant::with('profil')->get();
        return view('public.listeresto', compact('restaurants'));
    }

    public function promotions($id)
    {
    $restaurant = Restaurant::findOrFail($id);
    $profil = Profil::where('id_restaurant', $id)->first();
    
    $promotions = \App\Models\Promotion::where('id_restaurant', $id)
        ->where('date_deb', '<=', Carbon::today())
        ->where('date_fin', '>=', \Carbon\Carbon::today())
        ->get();

    return view('public.promo', compact('restaurant', 'profil', 'promotions'));
    }

    
}
