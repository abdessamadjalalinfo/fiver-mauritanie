<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
       @auth 
       @if(Auth::user()->type=="admin")
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('agents')}}">Gérer les Agents</a>
        </li>
        @endif

         @if(Auth::user()->type=="citoyen")
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('prendre_rendez_vous')}}">Prendre Un Rendez-Vous</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('dossiers')}}">Consulter l'état des dossiers</a>
        </li>
           <li class="nav-item">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Impression
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{route('acte_naissance')}}">Acte de naissance</a></li>
    <li><a class="dropdown-item" href="{{route('acte_mariage')}}">Acte de Mariage</a></li>
    <li><a class="dropdown-item" href="{{route('acte_divorce')}}">Acte de divorce</a></li>
  </ul>
</div> </li>
        @endif
       
       @endauth

   
        @auth 
      

        
         @if(Auth::user()->type=="agent")
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('statistiques')}}">Les statistiques</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('gestion_rdvs')}}">Gérer les rendez vous</a>
        </li>

       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('gestion_registes')}}">Gérer les registres</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('gestion_dossiers')}}">Gérer les Dossiers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('gestion_actes')}}">Gestion des actes</a>
        </li>
         
        @endif
       
       @endauth
      
      
        
        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
        @else
         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class=" btn btn-danger dropdown-togglenav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            @endguest
      </ul>
      
    </div>
  </div>
</nav>
      

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
