@extends('admin.layout.master')
@section('content')

<h1> Dashboard admin</h1>

<form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit">deconnecter</button>
</form>
@endsection