@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
Gestion des registres
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter un registre</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau citoyen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_citoyen')}}">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nom:</label>
            <input name='nom'type="text" class="form-control" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prénom:</label>
            <input name='prenom' type="text" class="form-control" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">émail:</label>
            <input name='email' type="email" class="form-control" id="recipient-name">
          </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">password:</label>
            <input name='password' type="password" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date de Naissance:</label>
            <input name='date_naissance' type="date" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu de Naissance:</label>
            <input name='lieu_naissance' type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nationalité:</label>
            <input name='natio' type="text" class="form-control" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">sexe:</label>
            <select name="sexe" id="">
            <option value="homme">Homme</option>
             <option value="femme">Femme</option>
            </select>
          </div>
          
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
          
        </form>
      </div>
      
    </div>
  </div>
  
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Email</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Lieu de Naissance</th>
      <th scope="col">Nationalité</th>
      <th scope="col">sexe</th>
      

    </tr>
  </thead>
  <tbody>
   @foreach($citoyens as $citoyen)
    <tr>
    <th scope="row">{{$citoyen->email}}</th>
      <th >{{$citoyen->nom}}</th>
      <td>{{$citoyen->prenom}}</td>
      <td>{{$citoyen->date_naissance}}</td>
      <td>{{$citoyen->lieu_naissance}}</td>
       <td>{{$citoyen->nationalite}}</td>
       <td>{{$citoyen->sexe}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

</div>
@endsection