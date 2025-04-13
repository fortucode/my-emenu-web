<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categorie = Category::where('id_cat', auth()->id())->get();
        // return view('admin.listecat', compact('categorie')); 

        $categorie = Category::all();
        return view('admin.listecat', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $validated = $request->validate([
            'libelle' => 'required|string|unique:category|max:255',
        ]);

        Category::create([
            'libelle' => $validated['libelle'],
        ]);

        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès.');
    
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
         // Récupérer la catégorie par son ID
        $categorie = Category::findOrFail($id);

            // Retourner la vue avec les données de la catégorie
        return view('admin.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validation des données entrantes
        $validated = $request->validate([
            'libelle' => 'required|string|unique:category|max:255',
        ]);

            // Trouver la catégorie par son ID
        $categorie = Category::findOrFail($id);

            // Mise à jour de la catégorie
        $categorie->update([
            'libelle' => $validated['libelle'],
        ]);

            // Redirection avec un message de succès
        return redirect()->route('categorie.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         // Trouver la catégorie par son ID
        $categorie = Category::findOrFail($id);

        // Suppression de la catégorie
        $categorie->delete();

        // Redirection avec un message de succès
        return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
