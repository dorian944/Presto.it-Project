<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4 mb-5">
                <h1>Dettaglio relativo a : {{$announcement->title}}</h1>
            </div>
        </div>


        <div class="row align-items-center">
            {{-- carosello --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://picsum.photos/id/27/1000/500" class="img-fluid rounded-3  w-50" alt="Prima immagine">
                  </div>
                  <div class="carousel-item ">
                    <img src="https://picsum.photos/id/28/1000/500" class="img-fluid rounded-3  w-50" alt="Seconda immagine">
                  </div>
                  <div class="carousel-item ">
                    <img src="https://picsum.photos/id/29/1000/500" class="img-fluid rounded-3  w-50" alt="Terza immagine">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
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
</x-layout>