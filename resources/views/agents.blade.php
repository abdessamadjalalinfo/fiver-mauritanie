@extends('layouts.app')

@section('content')
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter un agent</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Agent</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_agent')}}">
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
     
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">émail</th>
    </tr>
  </thead>
  <tbody>
   @foreach($agents as $agent)
    <tr>
    
      <td>{{$agent->nom}}</td>
      <td>{{$agent->prenom}}</td>
      <td>{{$agent->email}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection