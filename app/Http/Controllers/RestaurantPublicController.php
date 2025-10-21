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
    
    $restaurant = Restaurant::with(['plats', 'combos', 'promotions'])->findOrFail($id);
    if (!$restaurant->actif) {
        // Soit on redirige vers une page d’erreur, soit on affiche un message personnalisé
        return redirect()->route('home')->with('error', 'Ce restaurant est temporairement inactif sur notre site.');
    }
    $profil = Profil::where('id_restaurant', $id)->first();

    $promotion = $restaurant->promotions()
                    ->where('date_deb', '<=', now())
                    ->where('date_fin', '>=', now())
                    ->first();

    $plats = $restaurant->plats->map(function ($plat) use ($promotion) {
        if ($promotion) {
            $plat->prix_reduit = $promotion->type_remise === 'pourcentage'
                ? $plat->prix - ($plat->prix * ($promotion->valeur_remise / 100))
                : $plat->prix - $promotion->valeur_remise;
        } else {
            $plat->prix_reduit = null;
        }
        return $plat;
    });

    $combos = $restaurant->combos->map(function ($combo) use ($promotion) {
        if ($promotion) {
            $combo->prix_reduit = $promotion->type_remise === 'pourcentage'
                ? $combo->prix_special - ($combo->prix_special * ($promotion->valeur_remise / 100))
                : $combo->prix_special - $promotion->valeur_remise;
        } else {
            $combo->prix_reduit = null;
        }
        return $combo;
    });

    return view('public.restauran', compact('restaurant', 'profil', 'promotion', 'plats', 'combos'));
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
