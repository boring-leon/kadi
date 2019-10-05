@extends('layouts.app')
@section('title') Dlaczego Kadi wymaga rejestracji? @endsection

@section('content')
<main>
    <header>
        <h1 class='display-4 text-center'> Dlaczego Kadi wymaga założenia konta? </h1>
    </header>
    <article>
    <div class="text-center" style='margin-top:50px;'>
        <p class="lead">
            Kadi oferuje funkcjonalności, których działanie wymaga łączenia danych z kontem użytkownika. <br>
            Są to: <b>obliczanie dawek insuliny na podstawie indywidualnego przelicznika J/WW</b> oraz 
            <b> zapisywanie własnych dań i składników</b>.
            <br>
            <br>
            Dane Państwa są używane wyłącznie w procesie logowania do aplikacji i nie są nigdzie 
            rozpowszechniane.<br>
            Zgodnie z <i>RODO, art. 17 ust. 1</i>, mogą Państwo <b>w dowolnym momencie wysłać żądanie usunięcia
            konta</b> i wszystkich związanych z nim danych. Można to zrobić w panelu
            użytkownika wewnątrz aplikacji.
        </p> 
        <a role="button" href="{{ route('register') }}" class="btn btn-lg btn-primary"> 
            Powrót do rejestracji 
        </a>
    </div>
    </article>
</main>
@endsection
