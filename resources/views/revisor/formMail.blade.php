<x-layout>
    <div class="container-fluid h-index-custom">
        <div class="row ">
            <div class="col-12 text-center mt-5 ">
                <h1 class="mb-5">Invia una richiesta per diventare revisore: </h1>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <form class="shadow p-5 bg-grigio-light rounded-3" action="{{ route('revisor.submit') }}" method="POST">

                    {{-- messaggio insuccesso invio mail --}}
                    @if (session('emailError'))
                        <div class="alert alert-danger">
                            {{ session('emailError') }}
                        </div>
                    @endif
                    {{-- messaggio successo invio mail --}}
                    @if (session('emailSent'))
                        <div class="alert alert-success">
                            {{ session('emailSent') }}
                        </div>
                    @endif

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome dell'utente</label>
                        <input name="name" type="text" class="form-control" id="name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Mail dell'utente</label>
                        <input name="email" type="email" readonly="text" class="form-control" id="email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="user_message" class="form-label">Messaggio dell'utente</label>
                        <textarea name="user_message" id="user_message" cols="30" rows="7" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Invia richiesta</button>
                </form>
            </div>

        </div>
    </div>
</x-layout>
