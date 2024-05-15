<x-layout>
    <div class="container-fluid custom-view">
        <div class="row ">
            <div class="col-12 mt-5 mb-5">
                <h1 class="text-center">{{__("ui.index_annunci")}}</h1>
            </div>
        </div>

        <div class="row justify-content-center ">
            @forelse ($announcements as $announcement)

            <div class="col-12 col-md-3 ">
                    <x-card :announcement="$announcement" />
            </div>

            @empty

            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    {{-- __(ui.no_annunci) = Non ci sono annunci per questa ricerca. Prova a cambiare parola..  --}}
                    <p class="lead">{{__("ui.no_annunci")}} </p>
                </div>
            </div>

            @endforelse

            {{-- aggiunge la barra di navigazione tra le pagine es: <|1|2|3|> --}}
        </div>

    </div>

    <div class="d-flex justify-content-around mt-4 mb-4">
        {{$announcements->links()}}
    </div>
</x-layout>