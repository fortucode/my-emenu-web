@extends('admin.layout.master')
@section('content')

<h1> Dashboard admin</h1>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ajouter une nouvelle catégorie</h4>
        {{-- <p class="card-description"> Gestion catégorie</p> --}}
        <form class="forms-sample" enctype="multipart/data" action="{{route('categorie.store')}}"  method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">libelle</label>
            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libelle" required>
          </div>
            
          <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
          <button class="btn btn-light">Annuler</button>
        </form>
      </div>
    </div>
  </div>
@endsection