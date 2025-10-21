<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use App\Models\Plat;
use App\Models\Combo;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function dashboardAjax()
    {
        //dd(Auth::guard('client')->user());
        $client = Auth::guard('client')->user();

        $commandes = Commande::where('id_client', $client->id)
        ->with(['valider.plat', 'valider.combo'])
        ->latest()
        ->get();

        return view('client.dashboard-partial', compact('client', 'commandes'));
    }
   // ✅ Page du panier
    public function getPanier(Request $request)
    {
        $panier = json_decode($request->cookie('panier', '[]'), true);

        $items = collect($panier)->map(function ($item) {
            if ($item['type'] === 'plat') {
                $item['plat'] = Plat::find($item['id']);
            } else {
                $item['combo'] = Combo::find($item['id']);
            }
            return (object) $item;
        });

        $total = collect($items)->sum(function ($item) {
            return ($item->prix_reduit ?? $item->prix) * $item->quantite;
        });

        return view('client.panier', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    //CHECKOUT

    public function checkoutPanier(Request $request)
{
    $client = Auth::guard('client')->user();

    // Récupérer le panier depuis le cookie
    //$panier = json_decode($request->cookie('panier', '[]'), true);
    $panier = json_decode(urldecode($request->cookie('panier', '[]')), true);


    if (empty($panier)) {
        return back()->with('error', 'Votre panier est vide.');
    }

    // Créer la commande
    $commande = Commande::create([
        'id_client' => $client->id,
        'date' => now(),
        'statut' => 'en attente'
    ]);

    // Insérer dans la table VALIDER
    foreach ($panier as $item) {
        \App\Models\Valider::create([
            'id_com' => $commande->id_com,
            'id_plat' => $item['type'] === 'plat' ? $item['id'] : null,
            'id_combo' => $item['type'] === 'combo' ? $item['id'] : null,
            'quantite' => $item['quantite'],
            'precision' => $item['precision'] ?? null
        ]);
    }

    // Vider le cookie panier
    return redirect()->route('client.dashboard')
        ->withCookie(cookie()->forget('panier'))
        ->with('success', 'Commande validée avec succès !');
}
//FIN CHECK

    public function plats()
    {
        return $this->belongsToMany(\App\Models\Plat::class, 'commander_plat', 'id_com', 'id_plat')
                ->withPivot('quantite', 'precision');
    }

    public function combos()
    {
        return $this->belongsToMany(\App\Models\Combo::class, 'commander_combo', 'id_com', 'id_combo')
                ->withPivot('quantite', 'precision');
    }

}
