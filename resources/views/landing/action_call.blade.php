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