@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Ajouter un combo</h2>
    <form action="{{ route('combo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom du combo</label>
            <input type="text" name="nom_combo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="desc_combo" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Prix spécial</label>
            <input type="number" name="prix_special" step="0.01" class="form-control" required>
        </div>
        <h5>Choisir les plats du combo</h5>
    @foreach($plats as $plat)
        <div class="d-flex align-items-center mb-2">
            <input type="checkbox" name="plats[]" value="{{ $plat->id_plat }}">
            <span class="ms-2">{{ $plat->nom_plat }} ({{ number_format($plat->prix, 0, ',', ' ') }} FCFA)</span>
            
    <input type="number" name="quantites[{{ $plat->id_plat }}]" placeholder="Qté" class="form-control ms-3" style="width: 100px;">
        </div>
    @endforeach
     <!-- Liste des plats -->
    {{-- @foreach($plats as $plat)
        <div>
            <label>
                <input type="checkbox" name="plats[{{ $plat->id_plat }}][selected]" value="1">
                {{ $plat->nom_plat }}
            </label>
            <input type="number" name="plats[{{ $plat->id_plat }}][quantite]" min="0" value="0">
        </div>
    @endforeach --}}
        <div class="mb-3">
            <label class="form-label">Image (facultatif)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
