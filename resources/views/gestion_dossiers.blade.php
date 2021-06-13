@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
Gestion Les dossiers
</div>
    <table class="table">
  <thead>
    <tr>
     
      
      <th scope="col">Nom de dossier</th>
      
      <th scope="col">Etat?</th>
      <th scope="col">Citoyen</th>
    </tr>
  </thead>
  <tbody>
 
   @foreach($dossiers as $dossier)
    <tr>
    
      <td>{{$dossier->nom}}</td>
      
       <td>
       <form action="{{route('modifier_dossier')}}">
       <input type="hidden" name="id" value="{{$dossier->id}}">
       <input type="text" name="etat" value="{{$dossier->etat}}">
       <button type="submit" class="btn btn-success">Valider</button>
       </form>
    
       </td>
       <td>{{User::find($dossier->citoyen_id)->name}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection