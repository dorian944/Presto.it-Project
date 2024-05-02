<x-layout>
<div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
    <div class="row">
        <div class="col-12 p-5">
            <h1 class="display-2 text-center">
                {{$announcement_to_check ? 'Da revisionare' : 'Non ci sono annunci da revisionare'}}
            </h1>
        </div>
    </div>
</div>

@if($announcement_to_check)
    {{-- carosello --}}
    <div class="container">
        <div class="row">
            <div class="col-12">

                {{-- carosello dettaglio --}}
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        {{-- carosello --}}
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://picsum.photos/id/26/1200/800" class="img-fluid rounded-3" alt="Prima foto">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/id/27/1200/800" class="img-fluid rounded-3" alt="Seconda foto">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/id/28/1200/800" class="img-fluid rounded-3" alt="Terza foto">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                        {{-- fine carosello --}}
                        {{-- dettagli --}}
                        <div class="col-12 col-md-6 text-center">
                            <h5 class="card-title">Titolo: {{$announcement_to_check->title}}</h5>
                            <p class="card-text">{{$announcement_to_check->body}}</p>
                            <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                            <p>Categoria: {{$announcement_to_check->category->name}}</p>

                        </div>
                </div>
            <div class="row">
                {{-- pulsante accetta --}}
                 <div class="col-12 col-md-6">
                    <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" class="btn btn-success shadow">Accetta</button>
                    </form>
                </div>


                <div class="col-12 col-md-6">
                {{-- pulsante annulla ultima operazione --}}
                    <form action="{{ route('back.step') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Annulla ultima revisione</button>
                    </form>
                </div>



                {{-- pulsante rifiuta --}}
                <div class="col-12 col-md-6 text-end">
                    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                    </form>
                </div>

                {{-- chiusura row e col --}}
                </div>
            </div>




            </div>
        </div>
    </div>


@endif

</x-layout>