<x-layout>
    <div class="container-fluid h-index-custom custom-view">
        <div class="row ">
            <div class="col-12 text-center mt-5 ">
                <h1 class="mb-5">{{__('ui.titolo_revisore')}} </h1>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <form class="shadow p-5 bg-grigio-light bg-white rounded-4" action="{{ route('revisor.submit') }}" method="POST">

                    {{-- messaggio insuccesso invio mail --}}
                    @if (session('emailError'))
                        <div class="alert alert-danger ">
                            {{ session('emailError') }}
                        </div>
                    @endif
                    {{-- messaggio successo invio mail --}}
                    @if (session('emailSent'))
                        <div class="alert alert-success ">
                            {{ session('emailSent') }}
                        </div>
                    @endif

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.nome_utente')}} </label>
                        <input name="name" type="text" readonly="text" class="form-control" id="name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">e-mail</label>
                        <input name="email" type="email" readonly="text" class="form-control" id="email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="user_message" class="form-label">{{__('ui.messaggio_utente')}} </label>
                        <textarea name="user_message" id="user_message" cols="30" rows="7" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="button-custom mb-5">{{__('ui.richiesta')}} </button>
                </form>
            </div>

        </div>
    </div>
</x-layout>
