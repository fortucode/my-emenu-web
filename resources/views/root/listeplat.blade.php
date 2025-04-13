@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Liste des plats</h2>

    <a href="{{ route('plats.create') }}" class="btn btn-success mb-3">Ajouter un plat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plats as $plat)
                <tr>
                    <td>{{ $plat->nom_plat }}</td>
                    <td>{{ $plat->desc_plat }}</td>
                    <td>{{ $plat->prix }} F CFA</td>
                    <td>
                        @if($plat->photo_plat)
                            <img src="{{ asset('storage/' . $plat->photo_plat) }}" width="100" class="rounded" alt="image du plat">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('plats.edit', $plat->id_plat) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('plats.destroy', $plat->id_plat) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce plat ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
