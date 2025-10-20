
<div style="background: yellow; padding: 10px;">PANIER PARTIAL CHARGÉ ✅</div>

<div>
    <h5>Mon Panier</h5>
    <ul class="list-group">
        @forelse($items as $item)
            <li class="list-group-item d-flex justify-content-between">
                <span>
                    {{ $item->plat->nom_plat ?? $item->combo->nom_combo }}
                    (x{{ $item->quantite }})
                </span>
                <strong>{{ number_format($item->prix, 0, ',', ' ') }} FCFA</strong>
            </li>
        @empty
            <li class="list-group-item">Votre panier est vide.</li>
        @endforelse
    </ul>

    <div class="mt-3">
        <h6>Total : {{ number_format($panier->total, 0, ',', ' ') }} FCFA</h6>
    </div>

    <form method="POST" action="{{ route('client.panier.checkout') }}">
        @csrf
        <button type="submit" class="btn btn-success mt-2">Valider la commande</button>
    </form>
</div>
