@extends('layouts.app')

@section('title') Potwierdź swój e-mail @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Potwierdź swój e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Wysłano nowy link do weryfikacji
                        </div>
                    @endif
                    Przed przejściem dalej, należy potwierdzić swój adres e-mail.
                    Jeżeli nie otrzymałeś/aś maila, <a href="{{ route('verification.resend') }}">naciśnij tutaj</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
