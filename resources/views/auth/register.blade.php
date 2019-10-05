@extends('layouts.app')
@section('title') Rejestracja @endsection
@section('content')
<main>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class='float-left mt-2'>{{ __('Rejestracja') }}</span>
                    
                    <span class='float-right mt-2 '>
                        <a class='card-link' href="{{ route('register.info') }}">
                            Po co się rejestrować?
                        </a>
                        <a class='card-link' href="{{ route('login') }}">
                            Zaloguj się
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imie') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Powtórz hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exchanger" class="col-md-4 col-form-label text-md-right">{{ __('Przelicznik J/WW') }}</label>

                            <div class="col-md-6">
                                <input id="exchanger" type="number" class="form-control @error('exchanger') is-invalid @enderror" 
                                name="exchanger" value="{{ old('exchanger') }}" required step="0.01">
                                @error('exchanger')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zarejestruj się') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class='text-center'>
                        Należy wstępnie przyjąć przelicznik <b>1 WW = 1 jednostka</b> i sprawdzić glikemię 2h po posiłku. 
                        Dalej metodą prób i błędów :)
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
