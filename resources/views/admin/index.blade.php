@extends('layouts.app')

@section('title') Panel administratora @endsection

@section('content')
<main style="margin-top:20px;">
    <article style="margin-top:40px;">
        <div class="jumbotron container">
            <h1 class="display-4">Panel administratora</h1>
            <p class="lead">
                Wiem, że nie wygląda to najlepiej, ale działa
            </p>
            <hr class="my-4">    
            <div class='row'>
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('ingredient.list') }}" role="button">
                    Lista składników
                </a>
                <a class="btn btn-success btn-lg mr-2" href="{{ route('ingredient.create') }}" role="button">
                    Dodaj składnik
                </a>
                <a class="btn btn-secondary btn-lg mr-2" href="{{ route('user.list') }}" role="button">
                    Lista użytkowników
                </a>
                <a class="btn btn-info btn-lg mr-2" href="{{ route('production.cache') }}" role="button">
                    Cache 
                </a>
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('mails.index') }}">
                    Mailing
                </a>
            </div>
            <div clas='row'>
                <form action="{{ route('command.run') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Artisan call" 
                        name="command" required>
                    </div>
                    <button type="submit" class="btn btn-lg btn-block btn-success"> Exec </button>
                </form>
            </div>
        </div>
    </article>
        
</main>
@endsection