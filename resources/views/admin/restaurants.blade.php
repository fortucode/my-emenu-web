@extends('admin.layout.master')
@section('content')
<h1>Liste des restaurants</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
            <td>{{ $restaurant->email }}</td>
            <td>
                @if($restaurant->actif)
                    <span class="badge bg-success">Actif</span>
                @else
                    <span class="badge bg-danger">Désactivé</span>
                @endif
            </td>
            <td>
                <form action="{{ route('admin.restaurants.toggle', $restaurant) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm {{ $restaurant->actif ? 'btn-danger' : 'btn-success' }}">
                        {{ $restaurant->actif ? 'Désactiver' : 'Activer' }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
