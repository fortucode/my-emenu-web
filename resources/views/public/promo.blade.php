@extends('public.resto')
@section('promoactive', 'active')
@section('contentresto')
<!-- ======= promotion Section ======= -->

<section id="promo" class="promo">
  <div class="container" >

    <div class="section-title">
      <h2>Promotions</h2>
      <p>Nos Offres Spéciales</p>
    </div>

    <div class="events-slider swiper-container"  data-aos-delay="100">
      <div class="swiper-wrapper">

      @foreach($promotions as $promo)

        <div class="swiper-slide">
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="{{ asset('templatemenu/assets/img/event-custom.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>{{ $promo->nom_prom }}</h3>
              <div class="price">
                <p><span>Du {{ \Carbon\Carbon::parse($promo->date_deb)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($promo->date_fin)->format('d/m/Y') }}</span></p>
              </div>
              <p>{{ $promo->desc_prom }}</p>
              <ul>
                <li><i class="bi bi-check-circled"></i> Valable uniquement sur place.</li>
                <li><i class="bi bi-check-circled"></i> Non cumulable avec d'autres offres.</li>
              </ul>
              <p>Profitez vite de cette offre exceptionnelle chez {{ $restaurant->name }} !</p>
            </div>
          </div>
        </div>

      @endforeach
      

  </div>
</section>

@endsection
