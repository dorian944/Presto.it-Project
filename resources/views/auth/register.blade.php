<x-layout>

    <div class="container-fluid custom-register">
        <div class="row h-index-custom">

            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="container-form">
                  <img src="{{ asset('svg/signup.svg') }}" width="240" height="130" alt="login logo">

                    <div class="heading">{{__('ui.registrati')}} </div>
                    <form action="{{route('register')}}"  method="POST" class="form">
                     @csrf
                      <input required="" class="input" type="text" name="name" id="name" placeholder="Nome">
                      <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
                      <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
                      <input required="" class="input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Ripeti password">

                      <input class="login-button" type="submit" value="Registrati">

                    </form>
            </div>
        </div>
    </div>

</x-layout>