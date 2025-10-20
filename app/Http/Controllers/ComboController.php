<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combo;
use App\Models\Plat;
use App\Models\Contenir;

class ComboController extends Controller
{
    // public function index()
    // {
    //     $combos = Combo::where('id_restaurant', auth()->id())->get();
    //     return view('root.listecombo', compact('combos'));
    // }

    public function index()
{
    // On récupère uniquement les combos du restaurant connecté
    $combos = Combo::with(['plats' => function ($query) {
        $query->select('plat.id_plat', 'plat.nom_plat', 'plat.prix');
    }])
    ->where('id_restaurant', auth('restaurant')->id())
    ->get();

    return view('root.listecombo', compact('combos'));
}

    
    public function create()
    {
        $plats = Plat::where('id_restaurant', auth()->id())->get();
            return view('root.ajoutcombo', compact('plats'));
       // return view('root.ajoutcombo');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nom_combo' => 'required|string|max:255',
        'desc_combo' => 'required|string',
        'prix_special' => 'required|numeric|min:0',
        'plats' => 'required|array',
        'plats.*' => 'integer|exists:plat,id_plat',
        'quantites' => 'required|array',
    ]);

    // Créer le combo
    $combo = Combo::create([
        'nom_combo' => $request->nom_combo,
        'desc_combo' => $request->desc_combo,
        'prix_special' => $request->prix_special,
        'id_restaurant' => auth('restaurant')->id(),
    ]);

    // Associer les plats avec les quantités
    $platsData = [];
    foreach ($request->plats as $id_plat) {
        $quantite = $request->quantites[$id_plat] ?? 1; // on récupère par l’ID du plat
        $platsData[$id_plat] = ['quantite' => $quantite];
    }

    $combo->plats()->attach($platsData);

    return redirect()->route('combo.index')->with('success', 'Combo ajouté avec succès');
}

    public function edit($id)
    {
        $combo = Combo::where('id_restaurant', auth()->id())->findOrFail($id);
            $plats = Plat::where('id_restaurant', auth()->id())->get();

        return view('root.editcombo', compact('combo', 'plats'));
    }

    public function update(Request $request, $id)
{
    // Validation
    $validated = $request->validate([
        'nom_combo'   => 'required|string|max:255',
        'desc_combo'  => 'required|string',
        'prix_special'=> 'required|numeric|min:0',
        'plats'       => 'required|array',
        'plats.*'     => 'integer|exists:plat,id_plat',
        'quantites'   => 'required|array',
        'quantites.*' => 'integer|min:1'
    ]);

    // Récupération du combo du restaurant connecté
    $combo = Combo::where('id_restaurant', auth('restaurant')->id())
                  ->findOrFail($id);

    // Mise à jour des infos principales
    $combo->update([
        'nom_combo'    => $request->nom_combo,
        'desc_combo'   => $request->desc_combo,
        'prix_special' => $request->prix_special,
    ]);

    // Mise à jour des plats liés dans "contenir"
    $platsData = [];
    foreach ($request->plats as $id_plat) {
        $quantite = $request->quantites[$id_plat] ?? 1; 
        $platsData[$id_plat] = ['quantite' => $quantite];
    }

    // Synchronisation : supprime les anciens liens et ajoute les nouveaux
    $combo->plats()->sync($platsData);

    return redirect()->route('combo.index')->with('success', 'Combo modifié avec succès');
}

    public function destroy($id)
    {
        $combo = Combo::where('id_restaurant', auth()->id())->findOrFail($id);
        $combo->delete();

        return redirect()->route('combo.index')->with('success', 'Combo supprimé avec succès');
    }
}
