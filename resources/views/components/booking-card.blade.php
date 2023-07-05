<div
    class="flex flex-col md:flex-row items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full p-5 mb-3 max-w-screen-lg mx-auto dark:border-gray-700 dark:bg-gray-800">
    <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
        <a href="{{ route('movies.show', $booking->movie) }}">
            <img class="w-32 rounded-lg h-auto" src="{{ $booking->movie->poster_url }}" alt="{{ $booking->movie->title }}">
        </a>
    </div>
    <div class="flex flex-col flex-grow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center md:text-left">
                {{ $booking->movie->title }}
            </h2>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Date and Showtime
                </h3>
                <p class="text-gray-700 dark:text-gray-300">
                    {{ $booking->dateShowtime->date->date->format('D, j M Y') }}
                    {{ $booking->dateShowtime->showtime->start_time }}-{{ $booking->dateShowtime->showtime->end_time }}
                </p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Total Price
                </h3>
                <p class="text-gray-700 dark:text-gray-300">
                    Rp {{ number_format($booking->total_price) }}
                </p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Booking Status
                </h3>
                <p class="py-1 text-gray-700 dark:text-gray-300">
                    @if ($booking->status->value == 'paid')
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        @else
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                    @endif
                    {{ strtoupper($booking->status->value) }}
                    </span>
                </p>
            </div>
            @if ($booking->status->value == 'paid')
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                        Seat Numbers
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        @foreach ($booking->seats as $seat)
                            {{ $seat->seat_number }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    </p>
                </div>
            @endif
        </div>
        <div class="flex justify-center mt-4 md:justify-end">
            @if ($booking->status->value == 'paid')
                <form action="{{ route('bookings.update', $booking) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-primary-500 hover:bg-primary-600 rounded-lg focus:outline-none">
                        Cancel Booking
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
