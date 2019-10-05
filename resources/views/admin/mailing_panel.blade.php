@extends('layouts.app')

@section('title') Zarządzanie mailingiem @endsection

@section('content')
<main>
    <header>
        <h1 class='display-4'>Zarządzanie mailami</h1>
    </header>
    <article style="margin-top:40px;">
        @if(config('static.mailing.is_active'))
            <div class="alert alert-success">Mailing <b>jest aktywny</b></div>
            <a class="lead" href="{{ route('mails.preview') }}">
                Klasa : <b>{{ config('static.mailing.config') }}</b> 
            </a> <hr>
            <p class="lead"> Target: 
                <b>
                    @if(is_countable($target)) {{ count($target) }}
                    @else 1
                    @endif
                </b>
            </p>
            
            <form action="{{ route('mails.send')}}" method="POST" style="margin-top:20px;">
                @csrf
                <button class="btn btn-block btn-lg btn-success" type="submit"> 
                    Wyślij maile 
                </button>
            </form>

            <div class="card" style="margin-top:30px;">
                <ul class="list-group list-group-flush">
                    @foreach($target as $item)
                    <li class="list-group-item">{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @else
        <div class="alert alert-danger">Mailing <b>nie jest aktywny</b></div>
        @endif
    </article>
</main>
@endsection