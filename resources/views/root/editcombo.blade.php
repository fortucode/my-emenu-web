@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Modifier le combo</h2>

    <form action="{{ route('combo.update', $combo->id_combo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_combo" class="form-label">Nom du combo :</label>
            <input type="text" name="nom_combo" id="nom_combo" class="form-control"
                   value="{{ $combo->nom_combo }}" required>
        </div>

        <div class="mb-3">
            <label for="desc_combo" class="form-label">Description :</label>
            <textarea name="desc_combo" id="desc_combo" class="form-control" rows="3" required>{{ $combo->desc_combo }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix_combo" class="form-label">Prix :</label>
            <input type="number" name="prix_combo" id="prix_combo" class="form-control"
                   value="{{ $combo->prix }}" required>
        </div>

        <h5>Plats dans le combo</h5>
        @foreach($plats as $plat)
            @php
                $pivot = $combo->plats->firstWhere('id_plat', $plat->id_plat)?->pivot;
            @endphp
            <div class="mb-2 d-flex align-items-center">
                <span>{{ $plat->nom_plat }} ({{ number_format($plat->prix, 0, ',', ' ') }} FCFA)</span>
                <input type="number" name="quantites[{{ $plat->id_plat }}]" 
                       placeholder="Quantité" value="{{ $pivot->quantite ?? '' }}" 
                       class="form-control ms-3" style="width: 100px;">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection