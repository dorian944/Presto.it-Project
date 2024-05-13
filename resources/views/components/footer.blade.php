{{-- <footer class="text-center  my-3">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-linkedin"></i
        ></a>
        <!-- Github -->
        <a
          data-mdb-ripple-init
          class="btn btn-link btn-floating btn-lg text-body m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgb(39, 131, 103);">
      <a href="{{route('become.revisor')}}" class="text-body">Diventa revisore</a>
    </div>
    <!-- Copyright -->
  </footer> --}}


    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #247158;">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        @auth
          @if (!Auth::user()->is_revisor)
            <section >
              <p class="d-flex justify-content-center align-items-center ">
                <span class="me-3 text-black">{{__("ui.diventa_revisore")}} </span>
                <button data-mdb-ripple-init type="button" class="btn btn-outline-light  btn-rounded">
                  <a class="btn-footer-custom" href="{{route('become.revisor')}}">{{__("ui.button_revisore")}}</a>
                </button>
              </p>
            </section>
        @endif
        @endauth
        <!-- Section: CTA -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3 text-black" >
        © 2024 Copyright:
        <a class="text-white" href="#">Presto.it</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
