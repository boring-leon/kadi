<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id='nav'>
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
        </a>
        @auth
            @if(auth()->user()->isAdmin)
                <a role="button" class='btn btn-secondary right' href="{{ route('logout') }}">
                    Wyloguj
                </a>
            @endif
        @endauth
    </div>
</nav>