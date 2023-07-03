<div
    class="relative max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('movies.show', $movie->id) }}">
        <img class="rounded-t-lg" src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" />
    </a>
    <div class="p-5">
        <a href="{{ route('movies.show', $movie->id) }}">
            <h5 class="h-10 mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ mb_strimwidth($movie->title, 0, 20, '...') }}
            </h5>
        </a>

        <p class="h-10 mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ mb_strimwidth($movie->description, 0, 50, '...') }}
        </p>
    </div>

    <div class="flex flex-wrap m-3">
        <span
            class="bg-blue-100 text-blue-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
            Released: {{ explode('-', $movie->release_date)[0] }}
        </span>
        <span
            class="bg-pink-100 text-pink-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 border border-pink-400">
            Age Rating: {{ $movie->age_rating }}
        </span>
        <span
            class="bg-green-100 text-green-800 text-sm font-medium m-0.5 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
            Price: Rp {{ $movie->ticket_price }}
        </span>
    </div>
</div>
