@extends('root.layout.master')

@section('content')
<div class="container mt-4">
    <h2>Gérer mon profil</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="type_cuisine" class="form-label">Type de cuisine</label>
            <input type="text" name="type_cuisine" class="form-control" value="{{ old('type_cuisine', $profil->type_cuisine ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="horaire" class="form-label">Horaires (ex : ['Lundi: 8h-20h'])</label>
            <textarea name="horaire[]" class="form-control" rows="3">@if(!empty($profil)){{ implode("\n", $profil->horaire) }}@endif</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $profil->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label><br>
            @if(!empty($profil) && $profil->photo)
                <img src="{{ asset('storage/' . $profil->photo) }}" alt="Photo du profil" width="100" class="rounded mb-2"><br>
            @endif
            <input type="file" name="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
