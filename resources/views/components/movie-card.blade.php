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
        <x-movie-info :movie="$movie" />
    </div>
</div>
