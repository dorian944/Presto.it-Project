<x-layout>
    <div class="container-fluid mt-3 custom-view">
        <div class="row align-items-center ">


            <div class="col-12 text-center mt-custom-dettaglio-title mb-5">
                <h1>{{__('ui.dettaglio_relativo')}} {{$announcement->title}}</h1>
            </div>
        
    
            <div class="col-12 col-md-6 d-flex justify-content-end ">

                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    @if($announcement->images)
                            <div class="carousel-inner">
                                @foreach ( $announcement->images as $image )
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        {{-- <img src="{{Storage::url($image->path)}}" class="img-fluid  rounded-4" alt="img user"> --}}
                                        <img src="{{$image->getUrl(400,300)}}" class="img-fluid  rounded-3" alt="Immagine articolo">
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
            </div>
            

                <div class="col-12 col-md-6 ">
                    <h2 class="card-head ms-5 titolo-custom-show">{{$announcement->title}}</h2>
                    <p class="card-text ms-5 sottotitolo-custom-show"> {{$announcement->body}}</p>
                    <p class="card-text ms-5 sottotitolo-custom-show"> {{$announcement->price}} &euro;</p>
                    <p class="ms-5 sottotitolo-custom-show">{{__('ui.categoria')}}: <a class="link-show" href="{{route('categoryShow' , ['category' => $announcement->category->id])}}">{{$announcement->category->name}}</a></p>
                    <p class="card-text ms-5 sottotitolo-custom-show ">{{__('ui.pubblicato_il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                    <p class="card-text ms-5 sottotitolo-custom-show">{{__('ui.pubblicato_da')}} {{$announcement->user->name}}</p>
                </div>
            

        </div>
       </div>
    </div>

</x-layout>