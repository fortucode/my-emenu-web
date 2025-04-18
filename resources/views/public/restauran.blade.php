@extends('public.resto')
@section('contentresto')

<!--<p style="color: red">Vue de la page individuelle chargée !</p>

<p style="color:red">Chargement vue OK</p>


<-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <h2>{{ $restaurant->name ?? 'Aucun resto' }}</h2>
  <div class="container position-relative text-center text-lg-start" >
    <div class="row">
      <div class="col-lg-8">
        <h1>Bienvenue chez <span>{{ $restaurant->name }}</span></h1>
        <h2>{{ $profil->type_cuisine ?? 'Cuisine variée' }}</h2>

        <p class="mt-3 text-light">{{ $profil->description ?? 'Aucune description disponible.' }}</p>

        @if($profil->horaire)
          <ul class="text-start text-light">
            @foreach($profil->horaire as $jour => $plage)
              <li><strong>{{ $jour }}</strong> : {{ $plage }}</li>
            @endforeach
          </ul>
        @endif

        <div class="btns mt-4">
          <a href="#menu" class="btn-menu animated fadeInUp scrollto">Voir le Menu</a>
          <!--<a href="#promo" class="btn-book animated fadeInUp scrollto">Promotions</a>-->
          <a href="{{ route('restaurant.promotions', $restaurant->id) }}" class="btn-book animated fadeInUp">Promotions</a>

        </div>
      </div>

      @if($profil->photo)
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative">
          <img src="{{ asset('storage/' . $profil->photo) }}" class="img-fluid rounded shadow" width="250">
        </div>
      @endif
    </div>
  </div>
</section>


@include('public.menu')
<!-- End Hero -->
@endsection