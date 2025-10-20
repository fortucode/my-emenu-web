<div class="popup">
    <h3>Mon Panier</h3>

    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->plat->nom_plat ?? $item->combo->nom_combo }}
                - {{ $item->quantite }} x {{ number_format($item->prix, 0, ',', ' ') }} FCFA
            </li>
        @endforeach
    </ul>

    <h4>Total : {{ number_format($panier->total, 0, ',', ' ') }} FCFA</h4>

    <form action="{{ route('client.panier.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Valider ma commande</button>
    </form>
</div>
