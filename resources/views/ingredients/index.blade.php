@extends('layouts.app')

@section('title') Lista składników @endsection

@section('content')
<main>
    <h4 class='display-4'> Łącznie {{ count($ingredients) }} </h4>
    <article style='margin-top:30px;'>
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($ingredients as $ingredient)
                <a href="{{ route('ingredient.edit', $ingredient->id) }}" style='text-decoration:none;'>
                    <li class="list-group-item list-group-item-action" style="cursor:pointer;">
                        {{ $ingredient->name }} - edytuj
                    </li>
                </a>
                @endforeach
            </ul>
        </div>
    </article>
    
</main>
@endsection