@extends('layouts.app')

@section('content')
<div class="container">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{route('save_rendez_vous')}}">
  <fieldset >
    <legend>Prendre un Rendez Vous</legend>
    <div class="mb-3">
      <label  class="form-label">Besoin</label>
      <input name='besoin' type="text"  class="form-control">
    </div>
     <div class="mb-3">
      <label  class="form-label">Déscription</label>
      <input name='description' type="text"  class="form-control">
    </div>
     <div class="mb-3">
      <label  class="form-label">Date</label>
      <input name='date' type="date"  class="form-control">
    </div>
  
 
    <button type="submit" class="btn btn-primary">Valider</button>
  </fieldset>
</form>
   <legend>Mes  Rendez Vous</legend>
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Besoin</th>
      <th scope="col">Déscription</th>
      <th scope="col">Date du rdv</th>
       <th scope="col">Confirmé?</th>
    </tr>
  </thead>
  <tbody>
   @foreach($rdvs as $rdv)
    <tr>
    
      <td>{{$rdv->besoin}}</td>
      <td>{{$rdv->description}}</td>
      <td>{{$rdv->date_rdv}}</td>
      <td>
      @if($rdv->etat=="oui")
      <h1 class=" alert-success"> {{$rdv->etat}}</h1>
     
      @else
       <h1 class=" alert-danger"> {{$rdv->etat}}</h1>
      @endif</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection