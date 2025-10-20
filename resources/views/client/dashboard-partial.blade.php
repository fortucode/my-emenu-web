<div id="dashboardContent">
    
    <h5>Bienvenue, {{ $client->name }}</h5>

    <!-- Bouton Panier -->
   <!-- Bouton Panier -->
<button id="btnPanier" class="btn btn-sm btn-outline-primary">
    🛒 Mon Panier
</button>

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
document.addEventListener('DOMContentLoaded', function() {
   
    

    // --- Bouton "Mon Panier" ---
    const btnPanier = document.getElementById('btnPanier');
    const panierDiv = document.getElementById('panierContent');

    if (btnPanier && panierDiv) {
        btnPanier.addEventListener('click', function() {
            console.log("Bouton panier cliqué");

            fetch("{{ route('client.panier.ajax') }}")
                .then(response => response.text())
                .then(html => {
                    panierDiv.innerHTML = html;
                    panierDiv.style.display = 'block';
                })
                .catch(error => {
                    console.error("Erreur lors du chargement du panier :", error);
                    alert("Impossible de charger le panier.");
                });
        });
    } else {
        console.warn("btnPanier ou panierContent introuvable dans le DOM");
    }

    // --- Boutons "Ajouter au panier" ---
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const nom = this.dataset.nom;
            const prix = parseFloat(this.dataset.prix);
            const prix_reduit = parseFloat(this.dataset.prix_reduit || prix);

            let panier = [];
            try {
                panier = JSON.parse(getCookie('panier') || '[]');
            } catch (e) {
                console.error("Erreur de parsing du cookie panier", e);
            }

            let item = panier.find(i => i.type === type && i.id == id);
            if (item) {
                item.quantite += 1;
            } else {
                panier.push({ type, id, nom, prix, quantite: 1, prix_reduit });
            }

            document.cookie = "panier=" + JSON.stringify(panier) + ";path=/;max-age=" + (7 * 24 * 60 * 60);

            alert("Produit ajouté au panier !");

            // Mise à jour du partial si visible
            if (panierDiv && panierDiv.style.display === 'block') {
                fetch("{{ route('client.panier.ajax') }}")
                    .then(response => response.text())
                    .then(html => {
                        panierDiv.innerHTML = html;
                    });
            }
        });
    });

     // --- Fonction pour lire un cookie ---
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }
});
</script>


<script>
    function confirmLogout() {
        if (confirm("Voulez-vous vraiment vous déconnecter ?")) {
            document.getElementById('logoutForm').submit();
        }
    }
</script>



</div>
