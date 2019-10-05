@extends('layouts.app')

@section('title') {{ config('app.name') }} - {{ $data['user']->name }}  @endsection

@section('head-script')
    <script>window.baseState = {!! json_encode($data, true ) !!};</script>
@endsection

@section('content')
    <div id='app'></div>
    @section('body-bottom-script')<script src="{{ asset('js/app.js') }}"></script>@endsection
@endsection