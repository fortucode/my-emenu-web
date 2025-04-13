@extends('root.layout.master')
@section('content')

<!-- partial -->
        
<<div class="container mt-4">
      <h2 class="card-title">Ajouter un nouveau plat</h2>
      {{-- <p class="card-description"> Gestion catégorie</p> --}}
      <form action="{{ route('plats.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
        <div class="mb-3">
             <label class="form-label">Nom du plat :</label>
            <input type="text" name="nom_plat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea name="desc_plat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Prix :</label>
            <input type="number" name="prix" class="form-control" required min="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Photo :</label>
            <input type="file" name="photo_plat"  class="form-control">

        </div>
        <div class="mb-3">
            <label class="form-label">Catégorie :</label>
            <select name="id_cat" class="form-control" required>
              @foreach($categorie as $categories)
                <option value="{{ $categories->id_cat }}">{{ $categories->libelle }}</option>
              @endforeach
            </select>

        </div>
  
              <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
</div>
           <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
@endsection