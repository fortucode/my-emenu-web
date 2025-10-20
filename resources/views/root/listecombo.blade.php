@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Liste des combos</h2>

    <a href="{{ route('combo.create') }}" class="btn btn-success mb-3">Ajouter un combo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix spécial</th>
                <th>Composant</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($combos as $combo)
                <tr>
                    <td>{{ $combo->nom_combo }}</td>
                    <td>{{ $combo->desc_combo }}</td>
                    <td>{{ $combo->prix_special }} F CFA</td>
                    <td>
            {{-- <ul>
                @foreach($combo->plats as $plat)
                    <li>{{ $plat->nom_plat }} (x{{ $plat->pivot->quantite }})</li>
                @endforeach
            </ul> --}}
<p>
    @php
        $liste = $combo->plats->map(function($plat) {
            return $plat->pivot->quantite . ' ' . $plat->nom_plat;
        })->implode(' + ');
    @endphp

    {{ $liste }}
</p>
        </td>
                    <td>
                        @if($combo->image)
                            <img src="{{ asset('storage/' . $combo->image) }}" width="80">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('combo.edit', $combo->id_combo) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('combo.destroy', $combo->id_combo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce combo ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
