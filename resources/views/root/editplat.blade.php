@extends('layout.master')
@section('content')

<form action="{{ route('plats.update', $plat->id_plat) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nom du plat :</label>
    <input type="text" name="nom_plat" value="{{ $plat->nom_plat }}" required>

    <label>Description :</label>
    <textarea name="desc_plat" required>{{ $plat->desc_plat }}</textarea>

    <label>Prix :</label>
    <input type="number" name="prix" value="{{ $plat->prix }}" required min="0">

    <label>Photo :</label>
    <input type="file" name="photo_plat">
    <img src="{{ asset('storage/' . $plat->photo_plat) }}" width="100">

    <label>Catégorie :</label>
    <select name="id_cat" required>
        @foreach($categorie as $categories)
            <option value="{{ $categories->id_cat }}" @if($categories->id_cat == $plat->id_cat) selected @endif>
                {{ $categories->libelle }}
            </option>
        @endforeach
    </select>

    <button type="submit">Mettre à jour</button>
    <a href="{{ route('plats.index') }}" class="btn btn-light">Annuler</a>
</form>

@endsection