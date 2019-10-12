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
        @include('landing.action_call')
      </header>
      <section class="features-icons bg-white text-center" style='padding-top:35px;'>
        <h2 class='display-4 mb-4'> 
          Dlaczego warto używać kalkulatora Kadi? 
        </h2>
        <div style='display: flex; justify-content: center;'>
        @include('landing.why_use') </div>
        <hr>
        <h2 class='display-4 mb-4'> 
          Jakie jest Kadi? 
        </h2>
        @include('landing.icons')
        <hr>
        <h2 class='display-4 mb-4'> 
          Jak korzystać z Kadiego?
        </h2>
        @include('landing.tutorial')
      </section>

      <footer class="footer bg-white text-center" style='padding-top:8px; padding-bottom:8px;'>
        &copy; kadi {{ now()->year }}
      </footer>
@endsection