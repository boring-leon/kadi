@extends('layouts.landing')

@section('content')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
            <a role="button" class='btn btn-secondary right' href="{{ route('login') }}">
                Zaloguj
            </a>
        </div>
    </nav>   

      <header class="masthead text-white text-center">
        <div class="overlay" style='background-color:#222930'></div>
        <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
              <h1 class="mb-5">
                {{ config('app.name') }} - kalkulator dla cukrzyków
            </h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <form>
                <div class="form-row">
                  <div class="col">
                    <a role="button" class="btn btn-block btn-lg btn-primary" href="{{ route('login') }}">
                        Zaloguj się
                    </a>
                  </div>
                  <div class="col">
                    <a role="button" class="btn btn-block btn-lg btn-success" href="{{ route('register') }}">
                        Zarejestruj się
                    </a>
                  </div>
                </div>

                <a class="btn btn-block btn-lg btn-info why-register-btn" href="{{ route('register.info') }}"
                style="margin-top:15px;">
                  Dlaczego aplikacja wymaga rejestracji ?
                </a>                  
              </form>
            </div>
          </div>
        </div>
      </header>
      <section class="features-icons bg-light text-center">

        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="fas fa-mobile-alt m-auto text-primary"></i>
                </div>
                <h3>Responsywny</h3>
                <p class="lead mb-0">wygoda korzystania na każdym urządzeniu</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="fas fa-credit-card m-auto text-primary"></i>
                </div>
                <h3>Darmowy</h3>
                <p class="lead mb-0">
                   bez żadnych sztuczek, po prostu
                </p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="fas fa-check-circle m-auto text-primary"></i>
                </div>
                <h3>Intuicyjny</h3>
                <p class="lead mb-0">
                    a w razie problemów napisz na
                    <a href="https://www.facebook.com/kalkulatorkadi" target="_blank"> facebooku </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer class="footer bg-light text-center" style='padding-top:8px; padding-bottom:8px;'>
        &copy; kadi {{ now()->year }}
      </footer>
@endsection