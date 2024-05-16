<x-layout>

    <div class="container-fluid custom-view">
        <div class="row">
            <div class="col-12">
                {{-- ("ui.benvenuto") = Benvenuto/a nella tua area personale  --}}
               <h1 class="text-center mt-5">{{__("ui.benvenuto")}}</h1> 
            </div>
        </div>

        {{-- <div class="row justify-content-center">
            <h1 class="text-center">WORK IN PROGRESS....</h1>

            <img  style="width: 800px;" src="https://static.wixstatic.com/media/0ae27f_10ad9d3946314ac8b4c9ed2a9d0483c6~mv2.png/v1/fill/w_560,h_322,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Work-in-progress.png" alt="work-in-progress">
        </div> --}}

        {{-- info generali --}}
        <div class="row my-5">
            <div class="card-profilo">
                <h2 class="col-12 d-flex justify-content-center">
                    Nome utente : {{Auth::user()->name}}
                </h2>

                <h2 class="col-12 d-flex justify-content-center">
                     Email : {{Auth::user()->email}}
                </h2>

                <h2 class="col-12 d-flex justify-content-center">
                    {{ Auth::user()->is_revisor ? 'Sono revisore' : 'Non sono revisore' }} 
                </h2>
            </div>
        </div>

    </div>

</x-layout>