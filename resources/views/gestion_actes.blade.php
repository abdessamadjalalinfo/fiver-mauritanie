@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mariage" data-bs-whatever="@getbootstrap">+ un Acte Mariage</button>

<div class="modal fade" id="mariage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de mariage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_mariage')}}" method="post" enctype="multipart/form-data">
             @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date de Mariage:</label>
            <input name='date'type="date" class="form-control" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu de Mariage:</label>
            <input name='lieu' type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Homme:</label>
          <select name='homme' class="form-select" aria-label="Default select example">
           @foreach(User::all() as $user)
            <option value="{{$user->id}}" >{{$user->name}}</option>
            @endforeach
           
            </select>
          </div>
           <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Femme:</label>
          <select name="femme" class="form-select" aria-label="Default select example">
               @foreach(User::all() as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
          </div>
           <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Acte:</label>
          <input type="file" name="file"  class="form-control" id="recipient-name">
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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#divorce" data-bs-whatever="@getbootstrap">+ un acte de divorce</button>

<div class="modal fade" id="divorce" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de divorce</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_divorce')}}"method="post" enctype="multipart/form-data">
         
        @csrf  
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date de divorce:</label>
            <input name='date'type="date" class="form-control" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu de divorce:</label>
            <input name='lieu' type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Homme:</label>
          <select name='homme' class="form-select" aria-label="Default select example">
           @foreach(User::all() as $user)
            <option value="{{$user->id}}" >{{$user->name}}</option>
            @endforeach
           
            </select>
          </div>
           <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Femme:</label>
          <select name="femme" class="form-select" aria-label="Default select example">
               @foreach(User::all() as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
          </div>
            <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Acte:</label>
          <input type="file" name="file"  class="form-control" id="recipient-name">
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">+ un acte de déces</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de déces</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_deces')}}" method="post" enctype="multipart/form-data">
         
        @csrf  
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Citoyen:</label>
          <select name='id' class="form-select" aria-label="Default select example">
           @foreach(User::all() as $user)
            <option value="{{$user->id}}" >{{$user->name}}</option>
            @endforeach
           
            </select>
          </div>
            <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Acte:</label>
          <input type="file" name="file"  class="form-control" id="recipient-name">
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
<div class="alert alert-primary" role="alert">
 Actes de Divorces
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Lieu</th>
      <th scope="col">Date</th>
      <th scope="col">Homme</th>
      <th scope="col">Femme</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
    @foreach($actes_divorces as $acte)
    <tr>
      <th scope="row">{{$acte->lieu_divorce}}</th>
      <td>{{$acte->date_divorce}}</td>
      <td><?php echo User::find($acte->homme_id)->name;?></td>
      <td><?php echo User::find($acte->femme_id)->name;?></td>
       <td> <a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a></td>
    </tr>
    @endforeach
  
  </tbody>
</table>
<div class="alert alert-primary" role="alert">
 Actes de Mariage
</div>
<table class="table">
  <thead>
    <tr>
     <th scope="col">Lieu</th>
      <th scope="col">Date</th>
      <th scope="col">Homme</th>
      <th scope="col">Femme</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
      @foreach($actes_mariages as $acte1)
    <tr>
      <th scope="row">{{$acte1->lieu_mariage}}</th>
      <td>{{$acte1->date_mariage}}</td>
      <td><?php echo User::find($acte1->homme_id)->name;?></td>
      <td><?php echo User::find($acte1->femme_id)->name;?></td>
      <td> <a href="{{route('download',$acte1->path)}}" target='_blank' class="btn btn-success">Télécharger</a></td>
    </tr>
    @endforeach
  
  </tbody>
</table>
<div class="alert alert-primary" role="alert">
 Actes de Déces
</div>
<table class="table">
  <thead>
    <tr>
     <th scope="col">Citoyen</th>
      <th scope="col">path</th>
    
    </tr>
  </thead>
  <tbody>
      @foreach($actes_deces as $acte1)
    <tr>
      <td><?php echo User::find($acte1->citoyen_id)->name;?></td>
      <td>
      <a href="{{route('download',$acte1->path)}}" target='_blank' class="btn btn-success">Télécharger</a>
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>
<div class="alert alert-primary" role="alert">
 Actes de Naissance
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
   @foreach($actes_naissances as $acte2)
    <tr>
      <th scope="row"><?php echo User::find($acte2->citoyen_id)->nom;?></th>
      <td><?php echo User::find($acte2->citoyen_id)->prenom;?></td>
      <td><?php echo User::find($acte2->citoyen_id)->date_naissance;?></td>
      <td>{{$acte2->path}}</td>
    </tr>
    @endforeach
  
  </tbody>
</table>

</div>
@endsection