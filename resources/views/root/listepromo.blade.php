@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Liste des promotions</h2>

    <a href="{{ route('promotions.create') }}" class="btn btn-success mb-3">Ajouter une promotion</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promo)
                <tr>
                    <td>{{ $promo->nom_prom }}</td>
                    <td>{{ $promo->desc_prom }}</td>
                    
                    <td>{{ $promo->date_deb }}</td>
                    <td>{{ $promo->date_fin }}</td>
                    <td>
                        <a href="{{ route('promotions.edit', $promo->id_prom) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('promotions.destroy', $promo->id_prom) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
