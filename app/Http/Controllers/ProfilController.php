<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    //
    public function edit()
    {
        $profil = Profil::where('id_restaurant', auth()->id())->first();
        return view('root.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'type_cuisine' => 'required|string|max:255',
            'horaire' => 'required|array',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Stockage de la photo si une nouvelle a été uploadée
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads/profils', 'public');
        }

        $profil = Profil::updateOrCreate(
            ['id_restaurant' => auth()->id()],
            [
                'type_cuisine' => $validated['type_cuisine'],
                'horaire' => $validated['horaire'],
                'description' => $validated['description'],
                'photo' => $validated['photo'] ?? Profil::where('id_restaurant', auth()->id())->value('photo'),
            ]);
            return redirect()->route('profil.edit')->with('success', 'Profil mis à jour avec succès.');
    }

}
