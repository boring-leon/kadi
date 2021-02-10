@extends('layouts.app')

@section('title') Użytkownicy @endsection

@section('content')
<main>
    <header>
        <h1 class='display-4'> 
        Użytkownicy ({{ $total_users }})
        Zweryfikowani ({{ $verified_users  }})</h1>
    </header>
    <article style="margin-top:40px;">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">nazwa</th>
                <th scope="col">email</th>
                <th scope="col">J/WW</th>
                <th scope="col">składników</th>
                <th scope="col">posiłków</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              @if(!$user->isAdmin)
                @if($user->email_verified_at) <tr style='color: #1209b5; font-weight:600'>
                @else <tr>
                @endif
                  <td>{{$user->name }}</td>
                  <td>{{$user->email }}</td>
                  <td>{{$user->exchanger }}</td>
                  <td>{{ count($user->ingredients) }}</td>
                  <td>{{ count($user->meals) }}</td>
                </tr>
              @endif
            @endforeach
            </tbody>
          </table>
    </article>
    <footer>
        {{ $users->links() }}
    </footer>
</main>
@endsection