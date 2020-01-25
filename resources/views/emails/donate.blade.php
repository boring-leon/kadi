@component('mail::message')
# Dzień dobry {{ $user->name }}

Kadi to darmowa aplikacja, z której <b>codziennie korzystają setki osób</b>.
Niestety koszty utrzymania projektu są dość duże jak na jedną studencką kieszeń.
<b>Wsparcie w postaci dotacji kilku złotych byłoby ogromną pomocą</b>,
dzięki której strona działałaby w kolejnych latach i była stale rozwijana, jak do tej pory 😊.

Jeśli chcesz, 
<a href="https://kadi.com.pl/wsparcie" target="_blank">zobacz</a> jak możesz pomóc.


Pozdrawiamy,<br>
{{ config('app.name') }}
@endcomponent
