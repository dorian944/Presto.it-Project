<div class="container-fluid vh-100 ">
    <div class="row ">
        <div class="col-12 text-center mt-5">
            <h1  class="animated-text-from-right">PRESTO.IT</h1>

            <h5 class="animated-text-from-left">{{__("ui.sottotitolo_header")}}</h5>

            @auth
                <button class="mt-4">
                     <a href="{{route('announcements.create')}}" class="text-decoration-none text-white">{{__("ui.button_header")}}</a>
                </button>
            @endauth
        </div>



    </div>
</div>
