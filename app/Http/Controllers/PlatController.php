<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Category;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plats = Plat::where('id_restaurant', auth()->id())->get();
        return view('root.listeplat', compact('plats')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $plats= Plat::all();
        $categorie = Category::all();
        return view('root.ajoutplat' , compact('plats' , 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
{
    // Validation des données
    $validated = $request->validate([
        'nom_plat' => 'required|string|max:255',
        'desc_plat' => 'required|string',
        'prix' => 'required|numeric|min:0',
        'photo_plat' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'id_cat' => 'required|exists:category,id_cat',
    ]);

    // Gestion de l'upload de l'image
    if ($request->hasFile('photo_plat')) {
        $path = $request->file('photo_plat')->store('uploads/plats', 'public');
        $validated['photo_plat'] = $path;
    }

    // Création du plat
    //dd($validated);

    Plat::create([
        'nom_plat' => $validated['nom_plat'],
        'desc_plat' => $validated['desc_plat'],
        'prix' => $validated['prix'],
        'photo_plat' => $validated['photo_plat'],
        'id_cat' => $validated['id_cat'],
        'id_restaurant' => auth()->id(), 
    ]);
    

    return redirect()->route('plats.index')->with('success', 'Plat ajouté avec succès.');
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $plat = Plat::where('id_restaurant', auth()->id())->findOrFail($id);

        $categorie = Category::all();
        dd($plat);

        return view('root.editplat', compact('plat', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'nom_plat' => 'required|string|max:255',
        'desc_plat' => 'required|string',
        'prix' => 'required|numeric|min:0',
        'photo_plat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'id_cat' => 'required|exists:category,id_cat',
    ]);

        $plats = Plat::where('id_restaurant', auth()->id())->findOrFail($id);

    // Gestion de l'upload de l'image si une nouvelle est fournie
    if ($request->hasFile('photo_plat')) {
        $path = $request->file('photo_plat')->store('uploads/plats', 'public');
        $validated['photo_plat'] = $path;
    }

        $plats->update($validated);

    return redirect()->route('plats.index')->with('success', 'Plat modifié avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plats = Plat::where('id_restaurant', auth()->id())->findOrFail($id);
        $plats->delete();

        return redirect()->route('plats.index')->with('success', 'Plat supprimé avec succès.');
    }
}
