<x-layout>

  <div class="container-fluid custom-view-profilo ">
    <div class="row ">
        <div class="col-12 d-flex  justify-content-center">

            <div class="card mt-5" style="width: 25rem;">
                <img src="https://cdn.icon-icons.com/icons2/1154/PNG/512/1486564400-account_81513.png" class="card-img-top img-fluid z-3 p-5 " alt="foto utente">
                <div class="card-body z-3">
                  <h5 class="card-title text-center">{{__("ui.benvenuto")}}</h5>
                <h5 class="text-center">{{__("ui.nomeUtente")}} : {{Auth::user()->name}}</h5>
                  <p class="card-text text-center">Email : {{Auth::user()->email}}</p>
                  <p class="card-text text-center"> {{ Auth::user()->is_revisor ? __("ui.sono_revisore") : __("ui.nomeUtente") }} </p>
                </div>
              </div>

        </div>
    </div>
  </div>
   

</x-layout>