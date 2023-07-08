@props(['date'])

<div class="border shadow-lg border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center mb-4">
    <h3 class="text-xl font-semibold mb-4">{{ $date->date->format('D, j M Y') }}</h3>

    <ul class="text-center">
        {{ $slot }}
    </ul>
</div>
