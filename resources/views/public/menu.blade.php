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
            <div class="menu-content">
              <a href="#">{{ $plat->nom_plat }}</a><span>{{ number_format($plat->prix, 0, ',', ' ') }} FCFA</span>
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
            <div class="menu-content">
              <a href="#">{{ $combo->nom_combo }}</a><span>{{ number_format($combo->prix_special, 0, ',', ' ') }} FCFA</span>
            </div>
            <div class="menu-ingredients">
              {{ $combo->desc_combo }}
            </div>
          </div>
        @endforeach
  
      </div>
  
    </div>
  </section>
  