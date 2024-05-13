<x-layout>

    <div class="h-index-custom-revisor custom-view">
        <div class="container-fluid p-5  bg-custom-categorie shadow mb-4">
            <div class="row ">
                <div class="col-12 p-3">
                    <h1 class="display-2 text-center text-white">
                        {{$announcement_to_check ? 'Da revisionare' : 'Non ci sono annunci da revisionare'}}
                    </h1>
                </div>
            </div>
        </div>

        @if (session('messageAccetta'))
        <div class="alert alert-success custom-alert-revisore">
        {{ session('messageAccetta') }}
        </div>
        @endif

        @if (session('messageRifiuta'))
        <div class="alert alert-danger custom-alert-revisore">
        {{ session('messageRifiuta') }}
        </div>
        @endif

        @if($announcement_to_check)
            <div class="row mx-1">
            </div>
            {{-- carosello --}}
            <div class="container  ">
                <div class="row  my-5">
                    <div class="col-12">

                        {{-- carosello dettaglio --}}
                        <div class="row align-items-center ">
                            <div class="col-12 col-md-6">
                                {{-- carosello --}}
                                <div id="carouselExample" class="carousel slide" >
                                    @if($announcement_to_check->images)
                                        <div class="carousel-inner">
                                            @foreach ( $announcement_to_check->images as $image )
                                                <div class="carousel-item @if($loop->first) active @endif">
                                                    <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded" alt="img user">
                                                </div>    
                                            @endforeach
                                        </div>   
                                    @else
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
                                    @endif
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                {{-- sezione accetta --}}
                                <div class="row justify-content-between my-2">
                                    {{-- pulsante accetta --}}
                                    <div class="col-12 col-md-3">
                                        <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success shadow">{{__('ui.accetta_annuncio')}} </button>
                                        </form>
                                    </div>

                                    {{-- pulsante annulla ultima revisione --}}    
                                    <div class="col-12 col-md-5 text-end">
                                        <form action="{{ route('back.step') }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning me-4 shadow ">{{__('ui.annulla_revisione')}} </button>
                                        </form>
                                    </div>

                                    {{-- pulsante rifiuta --}}
                                    <div class="col-12 col-md-3 text-end">
                                        <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger shadow">{{__('ui.rifiuta_annuncio')}} </button>
                                        </form>
                                    </div>

                                    {{-- chiusura row e col --}}
                                </div>

                            </div>
                            {{-- fine carosello --}}
                            {{-- dettagli --}}
                            <div class="col-12 col-md-6 text-center">
                                <h5 class="card-title">{{__('ui.titolo')}}: {{$announcement_to_check->title}}</h5>
                                <p class="card-text">{{$announcement_to_check->body}}</p>
                                <p class="card-footer">{{__('ui.pubblicato_il')}}  {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                                <p>{{__('ui.Categorie')}}: {{$announcement_to_check->category->name}}</p>

                            </div>
                        </div>

                    </div>

                    
                </div>

            </div>  {{-- fine container --}}
        @else
            {{-- pulsante annulla ultima revisione --}} 
            <div class="row my-3 justify-content-center">   
                <div class="col-12 col-md-5 text-center ">
                    <form action="{{ route('back.step') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning me-4 shadow ">{{__('ui.annulla_revisione')}} </button>
                    </form>
                </div>
            </div>
        @endif

    </div>


</x-layout>