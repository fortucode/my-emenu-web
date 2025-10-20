@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste des commandes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Commande ID</th>
                <th>Client</th>
                <th>Date</th>
                <th>Plats</th>
                <th>Combos</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id_com }}</td>
                <td>{{ $commande->client->name }}</td>
                <td>{{ \Carbon\Carbon::parse($commande->date)->format('d/m/Y') }}</td>
                <td>
                    @foreach($commande->plats as $plat)
                        <div class="mb-2">
                            <strong>{{ $plat->nom_plat }}</strong> x{{ $plat->pivot->quantite }}<br>
                            @if($plat->pivot->precision)
                                <small class="text-muted">Précision : {{ $plat->pivot->precision }}</small>
                            @endif
                        </div>
                    @endforeach
                </td>
                <td>
                    @foreach($commande->combos as $combo)
                        <div class="mb-2">
                            <strong>{{ $combo->nom_combo }}</strong> x{{ $combo->pivot->quantite }}<br>
                            @if($combo->pivot->precision)
                                <small class="text-muted">Précision : {{ $combo->pivot->precision }}</small>
                            @endif
                        </div>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('commandes.update', $commande->id_com) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="statut" class="form-select form-select-sm"
                                onchange="this.form.submit()">
                            <option value="en attente" {{ $commande->statut == 'en attente' ? 'selected' : '' }}>En cours</option>
                            <option value="En cours" {{ $commande->statut == 'En cours' ? 'selected' : '' }}>Terminé</option>
                            <option value="Terminé" {{ $commande->statut == 'Terminé' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
