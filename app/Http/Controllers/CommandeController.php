<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Plat;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //

      // Liste des commandes du restaurant connecté
    public function index()
    {
        $restaurantId = auth('restaurant')->id();

        // Récupérer toutes les commandes qui contiennent un plat ou combo de ce restaurant
        $commandes = Commande::with(['client', 'valider.plat', 'valider.combo'])
            ->whereHas('valider.plat', fn($q) => $q->where('id_restaurant', $restaurantId))
            ->orWhereHas('valider.combo', fn($q) => $q->where('id_restaurant', $restaurantId))
            ->get();

        return view('root.commande', compact('commandes'));
    }

    // Mettre à jour le statut d'une commande
    public function update(Request $request, $id)
    {
        $commande = Commande::with('valider.plat', 'valider.combo')->findOrFail($id);

        $restaurantId = auth('restaurant')->id();

        // Vérifier si cette commande concerne bien le restaurant connecté
        $hasAccess = $commande->valider->contains(function ($item) use ($restaurantId) {
            return ($item->plat && $item->plat->id_restaurant == $restaurantId)
                || ($item->combo && $item->combo->id_restaurant == $restaurantId);
        });

        if (!$hasAccess) {
            abort(403, "Vous n'avez pas accès à cette commande.");
        }

        $request->validate([
            'statut' => 'required|string|in:en attente,en cours,terminé,annulé'
        ]);

        $commande->update(['statut' => $request->statut]);

        return redirect()->route('restaurant.commandes')
                         ->with('success', 'Le statut de la commande a été mis à jour avec succès.');
    }
}
