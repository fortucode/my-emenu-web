<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combo;

class ComboController extends Controller
{
    public function index()
    {
        $combos = Combo::where('id_restaurant', auth()->id())->get();
        return view('root.listecombo', compact('combos'));
    }
    
    public function create()
    {
        return view('root.ajoutcombo');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_combo' => 'required|string|max:255',
            'desc_combo' => 'required|string',
            'prix_special' => 'required|numeric|min:0',
        ]);

        // Ajoute ici manuellement l'id du restaurant
        $validated['id_restaurant'] = auth()->id();
       // dd(auth()->id()); // ← est-ce que ça renvoie bien l’ID du restaurant connecté ?

       // dd($validated);


        Combo::create($validated);

        return redirect()->route('combo.index')->with('success', 'Combo ajouté avec succès');
    }

    public function edit($id)
    {
        $combo = Combo::where('id_restaurant', auth()->id())->findOrFail($id);
        return view('root.editcombo', compact('combo'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom_combo' => 'required|string|max:255',
            'desc_combo' => 'required|string',
            'prix_special' => 'required|numeric|min:0',
        ]);

        $combo = Combo::where('id_restaurant', auth()->id())->findOrFail($id);
        $combo->update($validated);

        return redirect()->route('combo.index')->with('success', 'Combo modifié avec succès');
    }

    public function destroy($id)
    {
        $combo = Combo::where('id_restaurant', auth()->id())->findOrFail($id);
        $combo->delete();

        return redirect()->route('combo.index')->with('success', 'Combo supprimé avec succès');
    }
}
