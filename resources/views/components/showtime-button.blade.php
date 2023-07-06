@props(['movie', 'date', 'showtime', 'currentDate', 'currentTime'])

@php
    $disabled = $date->date < $currentDate && $showtime->start_time < $currentTime;
@endphp

<li>
    <a href="{{ route('bookings.create', [$movie, $date, $showtime]) }}">
        <button type="button"
            class="focus:outline-none text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-5 py-2.5 mr-2 mb-2
            {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
            {{ $disabled ? 'disabled' : '' }}>
            {{ $showtime->start_time }} - {{ $showtime->end_time }}
        </button>
    </a>
</li>
