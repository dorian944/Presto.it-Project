<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4 mb-5">
                <h1>Dettaglio relativo a : {{$announcement->title}}</h1>
            </div>
        </div>
    </div>

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



                    {{-- <div class="col-12 col-md-6 d-flex justify-content-center">
                        <img src="https://picsum.photos/600" class="img-fluid rounded-3" alt="foto">
                    </div> --}}
                    {{-- fine carosello --}}

                    <div class="col-12 col-md-6 text-center">
                        <h2>{{$announcement->title}}</h2>
                        <p>{{$announcement->body}}</p>
                        <p>{{$announcement->price}}</p>
                        <p>Categoria: {{$announcement->category->name}}</p>
                        <p>Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>