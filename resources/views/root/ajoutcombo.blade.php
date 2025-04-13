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
        <div class="mb-3">
            <label class="form-label">Image (facultatif)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
