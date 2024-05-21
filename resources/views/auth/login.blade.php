<x-layout>

    <div class="container-fluid custom-accedi ">
        <div class="row ">

            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="container-form">

                    <img src="{{ asset('svg/login.svg') }}" width="280" height="150" alt="login logo">

                    <div class="heading">{{__('ui.login')}} </div>
                    <form action="{{ route('login') }}" method="POST" class="form">
                        
                        @csrf
                        <input required="" class="input" type="email" name="email" id="email"
                            placeholder="E-mail">

                            @error('email')
                            <p>{{$message}}</p>
                            @enderror
                            
                        <input required="" class="input" type="password" name="password" id="password"
                            placeholder="Password">

                            @error('password')
                            <p>{{$message}}</p>
                            @enderror

                        {{-- <span class="forgot-password"><a href="#">{{__('ui.password_dimenticato')}} </a></span> --}}
                        <div class="mb-3 mt-2 ms-2 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{__('ui.ricordami_login')}} </label>

                        </div>
                        <input class="login-button" type="submit" value="{{__('ui.login')}}">

                        <button class=" login-button"  value="{{__('ui.registrati')}}">
                         <a class="btn-custom-accedi" href="{{route('register')}}">{{__('ui.registrati')}}</a>
                        </button>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layout>
