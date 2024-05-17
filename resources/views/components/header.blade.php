<div class="container-fluid img-header vh-100 ">
    <div class="row vh-100 align-items-center ">
        <div class="col-12 text-center">
                <h1 class="animated-text-from-right h1-homepage ">PRESTO.IT</h1>

                <h5 class="animated-text-from-left sottotitolo-homepage">{{__("ui.sottotitolo_header")}}</h5>

                {{-- far vedere il btn aggiungi articolo anche ai guest che poi li riporta nella pagina di registrazione --}}
                {{-- @auth --}}
                    <button class=" button-custom-homepage mt-4">
                         <a href="{{route('announcements.create')}}" class="text-decoration-none text-white testo-bottone-homepage ">{{__("ui.button_header")}}</a>
                    </button>
                {{-- @endauth --}}
        </div>



    </div>
</div>
