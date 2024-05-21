<x-layout>
  
  <div class="container-fluid custom-view-profilo ">
    <div class="row ">
      <div class="col-12 d-flex  justify-content-center">
        
        <div class="card mt-5 ms-4" style="width: 20rem;">
          <img src="https://cdn.icon-icons.com/icons2/1154/PNG/512/1486564400-account_81513.png" class="card-img-top img-fluid z-3 p-5 " alt="foto utente">
          <div class="card-body z-3">
            <h5 class="card-title text-center">{{__("ui.benvenuto")}}</h5>
            <h5 class="text-center">{{__("ui.nomeUtente")}} : {{Auth::user()->name}}</h5>
            <p class="card-text text-center">Email : {{Auth::user()->email}}</p>
            <p class="card-text text-center"> {{ Auth::user()->is_revisor ? __("ui.sono_revisore") : __("ui.no_revisore") }} </p>
          </div>
        </div>
        
      </div>
    {{-- fine row fine card utente--}}
    </div>

      {{-- container annunci pubblicati dall'utente --}}
      <div class="container mt-5 mb-5" >
        <div class="row ">
          <div class="col-12 my-4">
            <p class="h1 text-center mt-5 "> {{__("ui.i_tuoi_annunci")}} </p>
          </div>
              
         
          @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4 ">
                <x-card :announcement="$announcement" />
            </div>

            @empty
            <div class="col-12">
                <p class="h1 text-center mt-5">{{__("ui.no_annunci_personali")}}</p>
                <p class="h2 text-center"> {{__('ui.pubblica_annuncio')}}
                    <a href="{{route('announcements.create')}}" class="btn btn-success shadow">
                     {{__('ui.btn_nuovo_annuncio')}}
                    </a>
                </p>
            </div>
        @endforelse
            
        </div>
    </div>
    {{-- fine annunci pubblicati dall'utente --}}
  </div>
  
  
</x-layout>