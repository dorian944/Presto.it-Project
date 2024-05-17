
<nav class="navbar colore-custom-navbar navbar-expand-lg p-4  ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item dropdown ">

                    {{-- categorie --}}
                    <a class="nav-link dropdown-toggle " href="#" id="categoriesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{__("ui.Categorie")}}
                    </a>

                    <ul class="dropdown-menu " aria-labelledby="categoriesDropdown ">
                        @foreach ($categories as $category)
                            <li class="custom-drop-categorie">
                                <a href="{{ route('categoryShow', compact('category')) }}" class="dropdown-item custom-drop-item-categorie">
                                   <div class="category-border-custom"> {{__("ui.".$category->name)}} </div>
                                </a>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                    </ul>
                </li>

                    {{-- lista annunci --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.index') }}">{{__("ui.lista_annunci")}}</a>
                </li>




            </ul>

            <ul class="navbar-nav">

                                {{-- login registrati --}}
                                @guest
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{-- ciao ospite --}}
                                        {{__('ui.guest')}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
    
                                            <a class="dropdown-item p-0 ps-4" href="{{ route('login') }}">{{__('ui.login')}}</a></li>
                                        <hr>
                                        <li>
                                            <a class="dropdown-item p-0 ps-4" href="{{ route('register') }}">{{__('ui.registrati')}}</a></li>
                                    </ul>
                                </li>
            
                            @endguest

                @auth

                    {{-- qua andrà il bottone search --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.welcome_login')}} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <div class="category-border-custom">
                                <a class="nav-link-custom" href="{{ route('announcements.create') }}">{{__('ui.button_header')}}</a>
                                </div>
                            </li>
                            <li>

                                <a class="dropdown-item" href="{{route('area.personale')}}">
                                    <div class="category-border-custom">
                                         {{__('ui.Area personale')}}
                                    </div>
                                </a>



                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit();">
                                    <div class="category-border-custom">
                                    Logout
                                </div>
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

                {{-- <li class="nav-item">
                    <form action="{{route('announcements.search')}}" method="GET" class="d-flex ms-4 mt-2">
                        <input name="searched" class="form-control me-2 input-search-custom" type="search" placeholder="{{__("ui.cerca_un_annuncio")}}" aria-label="Search">
                        <button class=" border rounded-2  btn-custom-search" type="submit">{{__("ui.cerca")}}</button>
                    </form>
                </li> --}}

                <li class="nav-item searchBox">
                    <form action="{{route('announcements.search')}}" method="GET" class="d-flex ">
                    <input class="searchInput"  type="search" name="searched" placeholder="{{__("ui.cerca_un_annuncio")}}">
                    <button class="searchButton" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                            <g clip-path="url(#clip0_2_17)">
                                <g filter="url(#filter0_d_2_17)">
                                <path d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges"></path>
                                </g>
                            </g>
                            <defs>
                                <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                                <feOffset dy="4"></feOffset>
                                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="out"></feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
                                </filter>
                                <clipPath id="clip0_2_17">
                                <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    </form>
                </li>




            </ul>
        </div>
    </div>
</nav>



</body>
</html>
