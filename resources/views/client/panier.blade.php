@extends('public.resto')
@section('contentresto')
<div>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
<div class="container mt-4">
    <h4>🛒 Mon Panier</h4>
    


    @if($items->isEmpty())
        <div class="alert alert-warning">Votre panier est vide.</div>
    @else
        <form action="{{ route('client.panier.checkout') }}" method="POST">
            @csrf

            <ul class="list-group mb-3">
                @foreach($items as $item)
                    <li class="list-group-item">
                        <strong>{{ $item->plat->nom_plat ?? $item->combo->nom_combo }}</strong><br>

                        <label>Quantité :</label>
                        <input type="number" name="quantites[{{ $item->id }}]" 
                               value="{{ $item->quantite }}" min="1" 
                               class="form-control form-control-sm w-25 d-inline-block mb-2">

                        <label>Précision :</label>
                        <input type="text" name="precisions[{{ $item->id }}]" 
                               value="{{ $item->precision ?? '' }}" 
                               class="form-control form-control-sm" placeholder="Ex: sans mayo, peu salé...">

                        <div class="mt-2">
                            <strong>{{ number_format($item->prix, 0, ',', ' ') }} FCFA</strong>
                        </div>
                    </li>
                @endforeach
            </ul>

            <h5>Total : {{ number_format($total, 0, ',', ' ') }} FCFA</h5>

            <button type="submit" class="btn btn-success mt-3">
                ✅ Valider la commande
            </button>
        </form>
    @endif
</div>
@endsection
