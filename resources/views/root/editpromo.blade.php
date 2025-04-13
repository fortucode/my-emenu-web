@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Modifier la promotion</h2>
    <form action="{{ route('promotions.update', $promotion->id_promo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom_prom" class="form-label">Nom de la promotion</label>
            <input type="text" name="nom_prom" class="form-control" value="{{ $promotion->nom_promo }}" required>
        </div>
        <div class="mb-3">
            <label for="desc_prom" class="form-label">Description</label>
            <textarea name="desc_prom" class="form-control" required>{{ $promotion->desc_promo }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="date_deb" class="form-label">Date de début</label>
            <input type="date" name="date_deb" class="form-control" value="{{ $promotion->date_debut }}" required>
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{ $promotion->date_fin }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection
