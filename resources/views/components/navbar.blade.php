
<nav class="navbar colore-custom-navbar navbar-expand-lg p-4  ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle " href="#" id="categoriesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__("ui.Categorie")}} 
                    </a>
                    
                    <ul class="dropdown-menu " aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categoryShow', compact('category')) }}" class="dropdown-item">
                                    {{__("ui.".$category->name)}}
                                </a>
                                <hr class="dropdown-divider m-0">
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.index') }}">{{__("ui.lista_annunci")}}</a>
                </li>

                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.guest')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{__('ui.login')}}</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{__('ui.registrati')}}</a></li>
                        </ul>
                    </li>
                @endguest

               
            </ul>

            <ul class="navbar-nav">
                @auth

                    {{-- qua andrà il bottone search --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.welcome_login')}} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="nav-link-custom" href="{{ route('announcements.create') }}">{{__('ui.button_header')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('area.personale')}}">
                                Area personale
                                </a>



                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit();">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                   

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative zona-revisore-custom "
                                aria-current="page" href="{{ route('revisor.index') }}">
                                {{__("ui.zona_revisore")}}
                                <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">unread messages </span>
                                </span>
                            </a>
                        </li>
                    @endif
                @endauth

              
                <li class="nav-item">
                    <div class="d-flex align-items-center ms-2">
                        <x-_locale lang="it" />
                        <x-_locale lang="en" />
                        <x-_locale lang="es" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>



</body>
</html>
