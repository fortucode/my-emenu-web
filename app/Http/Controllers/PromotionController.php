<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    //

    public function index()
    {
        $promotions = Promotion::where('id_restaurant', auth()->id())->get();
        return view('root.listepromo', compact('promotions'));
    }

    public function create()
    {
        return view('root.ajoutpromo');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_prom' => 'required|string|max:255',
            'desc_prom' => 'required|string',
            //'prix_promo' => 'required|numeric',
            'date_deb' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_deb',
        ]);

        Promotion::create(array_merge($validated, [
            'id_restaurant' => auth()->id()
        ]));

        return redirect()->route('promotions.index')->with('success', 'Promotion ajoutée avec succès.');
    }

    public function edit($id)
    {
        $promotion = Promotion::where('id_restaurant', auth()->id())->findOrFail($id);
        return view('root.editpromo', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom_prom' => 'required|string|max:255',
            'desc_prom' => 'required|string',
           // 'prix_promo' => 'required|numeric',
            'date_deb' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $promotion = Promotion::where('id_restaurant', auth()->id())->findOrFail($id);
        $promotion->update($validated);

        return redirect()->route('promotions.index')->with('success', 'Promotion mise à jour.');
    }

    public function destroy($id)
    {
        $promotion = Promotion::where('id_restaurant', auth()->id())->findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Promotion supprimée.');
    }
}
