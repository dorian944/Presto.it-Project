<x-layout>

    <div class=" custom-view w-custom">
        <div class="container-fluid p-5  bg-custom-categorie shadow mb-4">
            <div class="row ">
                <div class="col-12 p-3">
                    <h1 class="display-2 text-center text-white">
                        {{ $announcement_to_check ? __("ui.Da_revisionare") : __("ui.no_annunci_da_revisionare") }}

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

        @if ($announcement_to_check)
            {{-- carosello --}}
            <div class="container">
                {{-- container con una row divisa in due col una per il carosello e i tag e l'altro per il dettaglio --}}
                <div class="row my-5 w-custom">

                    {{-- sezione immagini --}}
                    <div class="col-12 col-md-6 ">

                       
                        <div class="row align-items-center  ">
                            <div class="col-12 col-md-6  w-custom">
                               
                                    <div id="gallery" class="bg-white rounded-3  ">
                                        {{-- carosello --}}
                                        <div id="carouselExample" class="carousel slide">
                                            @if ($announcement_to_check->images)
                                                <div class="carousel-inner">
                                                    @foreach ($announcement_to_check->images as $image)

                                                        <div class="carousel-item text-center @if ($loop->first) active @endif">
                                                            {{-- <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded dim_img_carousel " alt="img user"> --}}
                                                            {{-- immagine croppata --}}
                                                             <img src="{{$image->getUrl(400,300)}}" class="bordo-smussato-foto-revisor img-fluid  p-3 " alt="Immagine articolo"> 

                                                           
                                                            {{-- sezione label e revisione immagine all'interno del carosello --}}
                                                            <div class="container">
                                                                <div class="row mt-3 mb-3">
                                                                    @if($announcement_to_check->images)
                                                                        
                                                                        <div class="col-md-6 border-end">
                                                                            <h5 class="tc-accent mt-3">Tags</h5>
                                                                            <div class="p-2">
                                                                                @if ($image->labels)
                                                                                    @foreach ($image->labels as $label)
                                                                                        <p class="d-inline"> {{ $label }},</p>
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="card-body">
                                                                                <h5 class="tc-accent">{{__("ui.Revisione_immagini")}}</h5>
                                                                                <p>{{__("ui.Adulti")}}: <span class="{{ $image->adult }}"></span></p>
                                                                                <p>{{__("ui.Satira")}}: <span class="{{ $image->spoof }}"></span></p>
                                                                                <p>{{__("ui.Medicina")}}: <span class="{{ $image->medical }}"></span>
                                                                                </p>
                                                                                <p>{{__("ui.Violenza")}}: <span
                                                                                        class="{{ $image->violence }}"></span></p>
                                                        
                                                                                <p>{{__("ui.Contenuto_ammiccante")}}: <span
                                                                                        class="{{ $image->racy }}"></span></p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                    
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="https://picsum.photos/id/26/1200/800"
                                                            class="img-fluid rounded-3" alt="Prima foto">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="https://picsum.photos/id/27/1200/800"
                                                            class="img-fluid rounded-3" alt="Seconda foto">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="https://picsum.photos/id/28/1200/800"
                                                            class="img-fluid rounded-3" alt="Terza foto">
                                                    </div>
                                                </div>
                                            @endif
                                            <button class="carousel-control-prev " type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                        {{-- sezione pulsanti --}}
                                        <div class="row justify-content-between my-2 mx-1">

                                            {{-- pulsante rifiuta --}}
                                            <div class="col-4 col-md-3 text-end">
                                                <form
                                                    action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn btn-danger shadow">{{ __('ui.rifiuta_annuncio') }}
                                                    </button>
                                                </form>
                                            </div>
                                           

                                            {{-- pulsante annulla ultima revisione --}}
                                            <div class="col-4 col-md-5 mb-2 text-end">
                                                <form action="{{ route('back.step') }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn btn-warning me-4 shadow ">{{ __('ui.annulla_revisione') }}
                                                    </button>
                                                </form>
                                            </div>

                                             {{-- pulsante accetta --}}
                                             <div class="col-4 col-md-3 mb-3 ">
                                                <form
                                                    action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn btn-success shadow">{{ __('ui.accetta_annuncio') }}
                                                    </button>
                                                </form>
                                            </div>
                                            

                                        

                                    </div>
                               
                                </div>

                            </div>

                            

                        </div>

                        
                    </div>

                    {{-- sezione  dettaglio --}}
                    
                    <div class="col-12 col-md-6  d-flex justify-content-center">
                        <div class="row h-100 align-content-center text-center ">
                            
                            <h5 class="card-head grandezza-custom-dettaglio"> {{ $announcement_to_check->title }}</h5>
                           
                            <p class="card-text grandezza-custom-sottotitoli"> {{ $announcement_to_check->body }}</p>
                            <p class="card-text grandezza-custom-sottotitoli"> {{ $announcement_to_check->price }} &euro;</p>
                            <p class="grandezza-custom-sottotitoli">{{ __('ui.Categorie') }}: {{ $announcement_to_check->category->name }}</p>
                            <p class="card-footer grandezza-custom-sottotitoli">{{ __('ui.pubblicato_il') }}
                                 {{ $announcement_to_check->created_at->format('d/m/Y') }}
                            </p>
                            <p class="card-footer grandezza-custom-sottotitoli">{{__('ui.pubblicato_da')}} {{$announcement_to_check->user->name}}</p>

                           
    
                        </div>
                     {{-- fine sezione sezione  dettaglio fine col--}}
                    </div> 
                   
                </div> 

                

            </div> {{-- fine container --}}
                @else
                    {{--altrimenti se non ci sono annunci da revisionare cmq devi far visualizare il pulsante annulla ultima revisione, per annullare l'ultima revisione  --}}
                    <div class="row my-3 justify-content-center">
                        <div class="col-12 col-md-5 text-center ">
                            <form action="{{ route('back.step') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="btn btn-warning me-4 shadow ">{{ __('ui.annulla_revisione') }} </button>
                            </form>
                        </div>
                    </div>
        @endif
       
    </div>


</x-layout>
