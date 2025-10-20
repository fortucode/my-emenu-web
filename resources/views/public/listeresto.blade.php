@extends('public.resto')
@section('restoactive', 'active')
@section('contentresto')

<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Nos Restaurants</h2>
            <p>Découvrez les établissements disponibles sur notre plateforme</p>
        </div>

        @foreach($restaurants as $restaurant)
            @php
                $profil = $restaurant->profil;
            @endphp

            @if($profil)
                <div class="row mb-5">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="{{ asset('storage/' . $profil->photo) }}" class="img-fluid rounded shadow" alt="Image de {{ $restaurant->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>{{ $restaurant->name }}</h3>
                        <p class="fst-italic">
                            {{ Str::limit($profil->description, 50, '...') }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Type de cuisine : {{ $profil->type_cuisine }}</li>
                            <li><i class="bi bi-check-circle"></i> {{ count($profil->horaire) }} jours ouverts par semaine</li>
                        </ul>
                        <div class="mt-3">
                            <button onclick="window.location.href='{{ route('restaurant.public', $restaurant->id) }}'" class="btn btn-primary">
                                Voir plus
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</section>

@endsection
