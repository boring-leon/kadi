@extends('layouts.app')


@section('title') Logi błędów @endsection
<body>
@section('content')
  @if(count($logs) == 0 ) @include('vendor.laravel-log-viewer.no_logs')
  @else @include('vendor.laravel-log-viewer.log_view')
  @endif
@endsection
