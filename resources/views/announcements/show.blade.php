<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-4 mb-5">
                <h1>Dettaglio relativo a : {{$announcement->title}}</h1>
            </div>
        </div>


        <div class="row align-items-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="https://picsum.photos/600" class="img-fluid rounded-3" alt="foto">
            </div>

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