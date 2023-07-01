@extends('layouts.base')

@section('body')
    <!-- session flash message -->
    <x-flash-message />

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
