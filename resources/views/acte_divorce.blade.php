@extends('layouts.app')

@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
 Acte de Divorce
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
     <th scope="col">Lieu de Divorce</th>
      <th scope="col">Date de Divorce</th>
        
      <th scope="col">Acte de Divorce</th>
    </tr>
  </thead>
  <tbody>
  @foreach($actes as $acte)
    <tr>
      <th scope="row">{{Auth::user()->nom}}</th>
      <td scope="row">{{Auth::user()->prenom}}</td>
       <td>{{$acte->lieu_divorce}}</td>
      <td>{{$acte->date_divorce}}</td>
      <td><a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a></td>
    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
@endsection