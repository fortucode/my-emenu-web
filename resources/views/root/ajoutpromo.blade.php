@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Ajouter une promotion</h2>
    <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom_prom" class="form-label">Nom de la promotion</label>
            <input type="text" name="nom_prom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="desc_prom" class="form-label">Description</label>
            <textarea name="desc_prom" class="form-control" required></textarea>
        </div>
        
        <div class="mb-3">
            <label for="date_deb" class="form-label">Date de début</label>
            <input type="date" name="date_deb" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>
        <div class="mb-3">
    <label for="type_remise" class="form-label">Type de remise :</label>
    <select name="type_remise" id="type_remise" class="form-select">
        <option value="percent" {{ $promotion->type_remise ?? '' == 'percent' ? 'selected' : '' }}>Pourcentage (%)</option>
        <option value="fixed" {{ $promotion->type_remise ?? '' == 'fixed' ? 'selected' : '' }}>Montant fixe (FCFA)</option>
    </select>
</div>

<div class="mb-3">
    <label for="remise" class="form-label">Valeur de la remise :</label>
    <input type="number" name="remise" id="remise" class="form-control" 
           value="{{ $promotion->remise ?? '' }}" step="0.01" required>
</div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
