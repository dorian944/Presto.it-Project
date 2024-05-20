<x-layout>

    <div class="container-fluid custom-register">
        <div class="row">

            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="container-form">
                  <img src="{{ asset('svg/signup.svg') }}" width="280" height="150" alt="login logo">

                    <div class="heading">{{__('ui.registrati')}} </div>
                    <form action="{{route('register')}}"  method="POST" class="form">
                        
                     @csrf
                      <input required="" class="input" type="text" name="name" id="name" placeholder="{{__('ui.nome')}}">
                      @error('name')
                            <p>{{$message}}</p>
                      @enderror

                      <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
                      @error('email')
                      <p>{{$message}}</p>
                      @enderror

                      <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
                      @error('password')
                      <p>{{$message}}</p>
                      @enderror

                      <input required="" class="input" type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__('ui.ripeti_password')}}">
                        {{-- se la password non coincide l'errore viene visualizzato sotto alla password quindi il controllo seguente risulta inutile --}}
                            {{-- @error('password_confirmation')
                            <span class="text-danger alert-danger">{{$message}}</span>
                            @enderror --}}
                      <input class="login-button" type="submit" value="{{__('ui.registrati')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>