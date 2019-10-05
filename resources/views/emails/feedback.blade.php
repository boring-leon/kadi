@component('mail::message')
# Dzień dobry {{ $user->name }}

Chielibyśmy, aby Kadi był przydatnym i przyjaznym narzędziem. Mamy więc do Ciebie pytanie - 
jak Ci się korzysta z naszej aplikacji? Masz jakieś kłopoty lub uwagi? 
Jeżeli tak, odpisz na tego maila, lub napisz do nas na https://www.facebook.com/kalkulatorkadi/.

PS.
Krótki poradnik dotyczący korzystania z aplikacji znajdziesz pod adresem https://kadi.com.pl/jak-korzystac

Pozdrawiamy,<br>
{{ config('app.name') }}
@endcomponent
