@extends('root.layout.master')

@section('content')
<h2>Modifier le combo</h2>
<form action="{{ route('combo.update', $combo->id_combo) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nom_combo" value="{{ $combo->nom_combo }}" required><br>
    <textarea name="desc_combo" required>{{ $combo->desc_combo }}</textarea><br>
    <input type="number" step="0.01" name="prix_special" value="{{ $combo->prix_special }}" required><br>
    <button type="submit">Mettre à jour</button>
</form>
@endsection
