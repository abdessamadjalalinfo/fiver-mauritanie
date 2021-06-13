@extends('layouts.app')

@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
 Acte de Naissances
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Acte de Naissance</th>
    </tr>
  </thead>
  <tbody>
  @foreach($actes as $acte)
    <tr>
      <th scope="row">{{Auth::user()->nom}}</th>
      <td scope="row">{{Auth::user()->prenom}}</td>
      <td>{{Auth::user()->date_naissance}}</td>
      <td><a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a></td>
    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
@endsection