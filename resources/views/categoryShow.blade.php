<x-layout>

{{-- <div class="h-index-custom"> --}}
<div >

    <div class="container-fluid custom-view p-5  bg-custom-categorie shadow mb-4">
        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1 class="display-2 text-white"> {{__("ui.esplora_categoria")}}{{$category->name}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- <div class="row "> --}}
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement )
                        <div class="col-12 col-md-4 my-2">
                             <x-card :announcement="$announcement" />
                        </div>

                    @empty
                        <div class="col-12">
                            <p class="h1 text-center mt-5">{{__("ui.no_annunci")}}</p>
                            <p class="h2 text-center"> {{__('ui.pubblica_annuncio')}}
                                <a href="{{route('announcements.create')}}" class="btn btn-success shadow">
                                 {{__('ui.btn_nuovo_annuncio')}}
                                </a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>


</x-layout>