@extends('layouts.base')

@section('body')
    <x-navbar />
    <x-flash-message />

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
