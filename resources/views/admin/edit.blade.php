@extends('admin.layout.master')
@section('content')
<form action="{{ route('categorie.update', $categorie->id_cat) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" id="libelle" value="{{ $categorie->libelle }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <button type="button" class="btn btn-light" onclick="window.location.href='{{ route('categorie.index') }}'">Annuler</button>
            
</form>

@endsection