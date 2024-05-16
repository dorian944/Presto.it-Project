<x-layout>

    <div class="container-fluid custom-view">
        <div class="row">
            <div class="col-12">
               <h1 class="text-center mt-5">Benvenuto/a nella tua area personale : {{Auth::user()->name}}</h1> 
            </div>
        </div>

        {{-- <div class="row justify-content-center">
            <h1 class="text-center">WORK IN PROGRESS....</h1>

            <img  style="width: 800px;" src="https://static.wixstatic.com/media/0ae27f_10ad9d3946314ac8b4c9ed2a9d0483c6~mv2.png/v1/fill/w_560,h_322,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Work-in-progress.png" alt="work-in-progress">
        </div> --}}

        <div class="row">
            <div class="col-12">
                Nome utente : {{Auth::user()->name}}
                Password : {{Auth::user()->email}}
            </div>
        </div>
    </div>

</x-layout>