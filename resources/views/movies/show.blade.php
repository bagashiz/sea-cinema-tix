@extends('layouts.app')

@section('content')
    <section id="movie-detail"
        class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full p-6 max-w-screen-lg mx-auto my-6 md:flex-row md:max-w-4xl dark:border-gray-700 dark:bg-gray-800">
        <!-- Movie details section -->
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
            src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" />
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $movie->title }}
            </h5>
            <div class="flex flex-wrap my-3">
                <x-movie-info :movie="$movie" />
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $movie->description }}
            </p>
        </div>
    </section>

    <section id="dates-showtimes" class="p-6 max-w-screen-lg mx-auto">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-4 text-center">Dates and Showtimes</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($movie->dates as $date)
                    <div
                        class="border shadow-lg border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center mb-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $date->date->format('D, j M Y') }}</h3>

                        <ul class="text-center">
                            @foreach ($date->showtimes as $showtime)
                                <li class="mb-2">
                                    {{ $showtime->start_time }} - {{ $showtime->end_time }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- center the section --}}
    <section class="flex justify-center mx-auto p-6">
        <a href="#">
            <button type="button"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Book Now
            </button>
        </a>
    </section>
@endsection
