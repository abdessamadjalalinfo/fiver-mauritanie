@extends('layouts.app')

@section('content')
<div class="container">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{route('save_dossiers')}}">
  <fieldset >
    <legend>Nouveau Dossier</legend>
  <select name="acte" class="form-select" aria-label="Default select example">
  <option value='naissance'selected>Acte de Naissance</option>
  <option value="mariage">Acte de Mariage</option>
  <option value="divorce">Acte de Divorce</option>
 
</select>
       
         <br>   
  
 
    <button type="submit" class="btn btn-primary">Demander</button>
  </fieldset>
</form>
   <legend>Mes  Dossiers</legend>
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">Etat</th>
      
    </tr>
  </thead>
  <tbody>
   @foreach($dossiers as $dossier)
    <tr>
    
      <td>{{$dossier->nom}}</td>
      <td>{{$dossier->etat}}</td>
     
    
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection