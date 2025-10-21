<div id="dashboardContent">
    
    <h5>Bienvenue, {{ $client->name }}</h5>

    <!-- Bouton Panier -->
   <!-- Bouton Panier -->
<a href="{{ route('client.panier.show') }}" class="btn btn-sm btn-outline-primary">
    🛒 Mon Panier
</a>


<!-- Contenu du panier -->
<div id="panierContent" style="display:none;"></div>



    <p>Vous pouvez passer vos commandes ici :</p>
    <h5>Mes commandes</h5>
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Articles</th>
            <th>Précisions</th>
            <th>Total</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->date }}</td>
                <td>
                    @foreach($commande->plats as $plat)
                        - {{ $plat->nom_plat }} (x{{ $plat->pivot->quantite }}) <br>
                    @endforeach
                    @foreach($commande->combos as $combo)
                        - {{ $combo->nom_combo }} (x{{ $combo->pivot->quantite }}) <br>
                    @endforeach
                </td>
                <td>
                    @foreach($commande->plats as $plat)
                        @if($plat->pivot->precision)
                            <small>{{ $plat->pivot->precision }}</small><br>
                        @endif
                    @endforeach
                    @foreach($commande->combos as $combo)
                        @if($combo->pivot->precision)
                            <small>{{ $combo->pivot->precision }}</small><br>
                        @endif
                    @endforeach
                </td>
                <td>{{ number_format($commande->total, 0, ',', ' ') }} FCFA</td>
                <td>
                    @if($commande->statut == 'en attente')
                        <span class="badge bg-warning text-dark">En attente</span>
                    @elseif($commande->statut == 'en cours')
                        <span class="badge bg-info">En cours</span>
                    @elseif($commande->statut == 'terminée')
                        <span class="badge bg-success">Terminée</span>
                    @else
                        <span class="badge bg-secondary">{{ ucfirst($commande->statut) }}</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    <!-- Bouton Déconnexion -->
    <form id="logoutForm" method="POST" action="{{ route('client.logout') }}">
        @csrf
        <button type="button" class="btn btn-danger btn-sm" onclick="confirmLogout()">
            Déconnexion
        </button>
    </form>
</div>



 

<script>
    function confirmLogout() {
        if (confirm("Voulez-vous vraiment vous déconnecter ?")) {
            document.getElementById('logoutForm').submit();
        }
    }
</script>



</div>
