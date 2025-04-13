@extends('admin.layout.master')
@section('content')

<h1> Dashboard admin</h1>

<<div class="col-md-12 grid-margin stretch-card">
    <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Basic Tables </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Liste des categories</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <p class="card-description"> Add class <code>.table</code>
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Libelle</th>
                      <th>modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categorie as $categories)
                    <tr>
                      <td>{{$categories->id_cat}}</td>
                      <td>{{$categories->libelle}}</td>
                      <td><button class="badge badge-warning" onclick="window.location.href='{{route('categorie.edit', ['id'=>$categories->id_cat])}}'">Modifier</button></td>
                      <td>
                        <form action="{{ route('categorie.destroy', $categories->id_cat) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
            
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>

</div>
@endsection