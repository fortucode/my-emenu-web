<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants', compact('restaurants'));
    }

    public function toggle(Restaurant $restaurant)
    {
        $restaurant->actif = !$restaurant->actif;
        $restaurant->save();

        return redirect()->back()->with('success', 'Statut du restaurant mis à jour.');
    }
}
