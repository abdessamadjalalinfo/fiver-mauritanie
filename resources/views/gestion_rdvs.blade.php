@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
Gestion des rendez vous
</div>
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Date rdv</th>
      <th scope="col">Besoin</th>
      <th scope="col">Déscription</th>
      <th scope="col">Confirmé?</th>
      <th scope="col">Citoyen</th>
    </tr>
  </thead>
  <tbody>
   @foreach($rdvs as $rdv)
    <tr>
    
      <td>{{$rdv->date_rdv}}</td>
      <td>{{$rdv->besoin}}</td>
      <td>{{$rdv->description}}</td>
       <td>
       @if($rdv->etat=="oui")
       <a type="button" href="{{route('modifier_rendez_vous',$rdv->id)}}" class="btn btn-success">Oui</a>
       @else
       <a type="button" href="{{route('modifier_rendez_vous',$rdv->id)}}" class="btn btn-danger">non</a>
        @endif
       </td>
       <td>{{User::find($rdv->citoyen_id)->name}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection