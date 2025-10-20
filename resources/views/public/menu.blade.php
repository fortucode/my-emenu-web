<section id="menu" class="menu section-bg">
    <div class="container" >
  
      <div class="section-title">
        <h2>Menu</h2>
        <p>Découvrez les délicieuses propositions de ce restaurant</p>
      </div>
  
      <div class="row" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="menu-flters">
            <li data-filter="*" class="filter-active">Tout</li>
            <li data-filter=".filter-plat">Plats</li>
            <li data-filter=".filter-combo">Combos</li>
          </ul>
        </div>
      </div>
  
      <div class="row menu-container">
        
        {{-- Plats --}}
        @foreach($plats as $plat)
          <div class="col-lg-6 menu-item filter-plat">
            <img src="{{ asset('storage/' . $plat->photo_plat) }}" class="menu-img" alt="{{ $plat->nom_plat }}">
            <div class="menu-content d-flex justify-content-between align-items-center">
  <a href="#">{{ $plat->nom_plat }}</a>
  <span>
   @if($plat->prix_reduit && $plat->prix_reduit < $plat->prix)
    <del class="text-muted me-2">{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</del>
    <strong class="text-danger">{{ number_format($plat->prix_reduit, 0, ',', ' ') }} FCFA</strong>
@else
    {{ number_format($plat->prix, 0, ',', ' ') }} FCFA
@endif

  </span>
  <button class="btn btn-sm btn-success add-to-cart" 
      data-type="plat" 
      data-id="{{ $plat->id_plat }}">
      +
  </button>
</div>

            <div class="menu-ingredients">
              {{ $plat->desc_plat }}
            </div>
          </div>
        @endforeach
  
        {{-- Combos --}}
        @foreach($combos as $combo)
          <div class="col-lg-6 menu-item filter-combo">
            @if($combo->photo)
              <img src="{{ asset('storage/' . $combo->photo) }}" class="menu-img" alt="{{ $combo->nom_combo }}">
            @endif
            <div class="menu-content d-flex justify-content-between align-items-center">
  <a href="#">{{ $combo->nom_combo }}</a>
  <span>
@if($combo->prix_reduit && $combo->prix_reduit < $combo->prix_special)
    <del class="text-muted me-2">{{ number_format($combo->prix_special, 0, ',', ' ') }} FCFA</del>
    <strong class="text-danger">{{ number_format($combo->prix_reduit, 0, ',', ' ') }} FCFA</strong>
@else
    {{ number_format($combo->prix_special, 0, ',', ' ') }} FCFA
@endif

  </span>
  <button class="btn btn-sm btn-success add-to-cart" 
      data-type="combo" 
      data-id="{{ $combo->id_combo }}">
      +
  </button>
</div>

            <div class="menu-ingredients">
    @if($combo->plats && $combo->plats->count() > 0)
        <ul class="ps-3 m-0">
            @foreach($combo->plats as $plat)
                <li>
                    {{ $plat->nom_plat }} (x{{ $plat->pivot->quantite }})
                </li>
            @endforeach
        </ul>
    @else
        <em>Aucun plat enregistré dans ce combo</em>
    @endif
</div>

        @endforeach
  
      </div>
  
    </div>
  </section>
  