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
            
            <div class="list-group">
                <a class="list-group-item list-group-action" href="{{ route('ingredient.list') }}" role="button">
                    Lista składników
                </a>
                <a class="list-group-item list-group-action" href="{{ route('ingredient.create') }}" role="button">
                    Dodaj składnik
                </a>
                <a class="list-group-item list-group-action" href="{{ route('user.list') }}" role="button">
                    Lista użytkowników
                </a>
                <a class="list-group-item list-group-action" href="{{ route('production.cache') }}" role="button">
                    Cache 
                </a>
                <a class="list-group-item list-group-action" href="{{ route('mails.index') }}" role="button">
                    Mailing 
                </a>
                <a class="list-group-item list-group-action" href="{{ route('logs') }}" role="button">
                    Logs
                </a>
            </div>
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
    <script>
        document.querySelectorAll('.list-group-item').forEach(i => {
            i.addEventListener('mouseover', () => i.classList.add('active'));
            i.addEventListener('mouseout', () => i.classList.remove('active'));
        });
    </script>
        
</main>
@endsection