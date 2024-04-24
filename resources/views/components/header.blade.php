<div class="container-fluid vh-100">
    <div class="row ">
        <div class="col-12 ">
            <h1 class="ms-4">PRESTO.IT</h1>
        </div>
        @auth
        <div class="col-12 m-3 ">
            <button>
                 <a href="{{route('announcements.create')}}" class="text-decoration-none text-white">Inserisci annuncio</a>
            </button>
        </div>
        @endauth
    </div>
</div>
