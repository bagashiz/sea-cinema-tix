@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-8 text-3xl font-bold text-gray-900 dark:text-white">
                Booking Details
            </h2>
            <form action="{{ route('bookings.store', [$movie, $date, $showtime]) }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="movie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Movie
                        </label>
                        <input type="text" name="movie" id="movie" aria-label="movie"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                            value="{{ $movie->title }}" disabled readonly>
                    </div>
                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Date
                        </label>
                        <input type="text" name="date" id="date" aria-label="date"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                            value="{{ $date->date->format('D, j M Y') }}" disabled readonly>
                    </div>
                    <div class="w-full">
                        <label for="showtime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Showtime
                        </label>
                        <input type="text" name="showtime" id="showtime" aria-label="showtime"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                            value="{{ $showtime->start_time }} - {{ $showtime->end_time }}" disabled readonly>
                    </div>
                </div>

                {{-- seat lists --}}
                <div class="grid grid-cols-8 gap-4 mt-6">
                    @foreach ($seats as $seat)
                        <div>
                            <label for="seat{{ $seat->id }}" class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="seats[]" id="seat{{ $seat->id }}"
                                    value="{{ $seat->id }}"
                                    class="form-checkbox h-4 w-4 text-primary-500 border-gray-300 rounded focus:ring-primary-500"
                                    {{ $seat->isBooked($movie, $date, $showtime) ? 'disabled' : '' }}>
                                <span
                                    class="lg:ml-2 {{ $seat->isBooked($movie, $date, $showtime) ? 'text-red-500' : 'text-gray-900 dark:text-white' }}">
                                    {{ $seat->seat_number }}
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="px-3 py-2 my-6 text-xs font-bold text-center text-white bg-gray-500 rounded-lg">
                    SCREEN
                </div>
                @error('seats')
                    <x-error-message :message="$message" />
                @enderror

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-500 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-600">
                    Book Now
                </button>
            </form>
        </div>
    </section>
@endsection
