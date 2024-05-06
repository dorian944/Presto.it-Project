<x-layout>

    <div class="container-fluid my-5">
        <div class="row h-index-custom">

            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="container-form">

                    <img src="{{ asset('svg/login.svg') }}" width="280" height="150" alt="login logo">

                    <div class="heading">Accedi</div>
                    <form action="{{ route('login') }}" method="POST" class="form">
                        @csrf
                        <input required="" class="input" type="email" name="email" id="email"
                            placeholder="E-mail">
                        <input required="" class="input" type="password" name="password" id="password"
                            placeholder="Password">
                        <span class="forgot-password"><a href="#">Forgot Password ?</a></span>
                        <div class="mb-3 mt-2 ms-2 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ricordami</label>

                        </div>
                        <input class="login-button" type="submit" value="Accedi">

                    </form>
                   
                </div>
            </div>
        </div>
    </div>

</x-layout>
