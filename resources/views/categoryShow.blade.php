<x-layout>

<div class="h-index-custom">
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1 class="display-2"> Esplora la categoria {{$category->name}}</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement )
                        <div class="col-12 col-md-4 my-2">
                             <x-card :announcement="$announcement" />
                        </div>
                        
                    @empty
                        <div class="col-12">
                            <p class="h1 text-center mt-5">Non sono presenti annunci per questa categoria</p>
                            <p class="h2 text-center">Pubblicane uno: 
                                <a href="{{route('announcements.create')}}" class="btn btn-success shadow">
                                 Nuovo annuncio
                                </a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


</x-layout>