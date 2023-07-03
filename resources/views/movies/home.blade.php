@extends('layouts.app')

@section('content')
    <section id="filter" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="flex flex-col lg:flex-row justify-center">
            <div class="w-full lg:w-1/2 lg:p-2 mb-4 lg:mb-0">
                <x-sort />
            </div>
            <div class="w-full lg:w-1/2 lg:pl-2">
                <x-search />
            </div>
        </div>
    </section>

    <section id="movie-list" class="p-6 mx-auto max-w-7xl lg:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($movies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>

        <div class="my-6">
            {{ $movies->appends(request()->only('sort'))->links() }}
        </div>
    </section>
@endsection
