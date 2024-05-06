<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around m-2" id="navbarNavDropdown">

            <ul class="navbar-nav">

                {{-- sezione categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categoryShow', compact('category')) }}" class="dropdown-item">
                                    {{ $category->name }}
                                </a>
                                <hr class="dropdown-divider m-0">
                            </li>

                        @endforeach
                    </ul>
                </li>
                {{-- fine sezione categorie --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.index') }}">Lista annunci</a>
                </li>
            </ul>


          @guest
            <div class="p-custom-title-presto">
                <a class="navbar-brand " href="{{ route('homepage') }}">Presto.it</a>
            </div>
          @endguest

          @auth
          <div class="p-custom-logged-presto text-center">
              <a class="navbar-brand " href="{{ route('homepage') }}">Presto.it</a>
          </div>
          @endauth


            <div class="nav-item dropdown ">
                <div class="d-flex">
                    @auth
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Benvenuto {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            {{-- <li><a class="dropdown-item" href="{{}}"></a></li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('announcements.create') }}">Inserisci annuncio</a>
                            </li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a>
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endauth

                        {{-- zona revisore --}}
                    @auth
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link btn btn-outline-success btn-sm position-relative zona-revisore-custom ms-3"
                                    aria-current="page" href="{{ route('revisor.index') }}">
                                    Zona revisore
                                    <span
                                        class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">unread messages </span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    </div>
                     @endauth

                @guest
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ciao Ospite
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                    </ul>
                @endguest
                    <ul>
                        <li class="nav-item">
                            <x-_locale lang="it"  />
                            <x-_locale lang="en"  />
                            <x-_locale lang="es" />
                        </li>
                    </ul>
            </div>



        </div>
    </div>
</nav>
