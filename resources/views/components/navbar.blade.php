<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-around m-2" id="navbarNavDropdown">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>

        <a class="navbar-brand" href="#">Presto.it</a>


          <div class="nav-item dropdown mx-5">
          @auth
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              {{-- <li><a class="dropdown-item" href="{{}}"></a></li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{route('announcements.create')}}">Inserisci annuncio</a>
              </li>
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a>
                <form action="{{route('logout')}}" method="POST" id="logout">
                @csrf
                </form>
            </li>
            </ul>
          @endauth
          @guest
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao Ospite
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                <hr>
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
            </ul>
          @endguest

          </div>



      </div>
    </div>
</nav>