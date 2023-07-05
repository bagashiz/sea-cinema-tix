@extends('layouts.app')

@section('content')
    <x-auth-card>
        <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Edit Profile
        </h1>
        <form class="space-y-4 md:space-y-6" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- username --}}
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Username
                </label>
                <input type="username" name="username" id="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your username" required="" value="{{ old('username') ?? $user->username }}">
                @error('username')
                    <x-error-message :message="$message" />
                @enderror
            </div>

            {{-- name --}}
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Name
                </label>
                <input type="name" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your name" required="" value="{{ old('name') ?? $user->name }}">
                @error('name')
                    <x-error-message :message="$message" />
                @enderror
            </div>

            {{-- age --}}
            <div>
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Age
                </label>
                <input type="number" name="age" id="age"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="your age" required="" value="{{ old('age') ?? $user->age }}">
                @error('age')
                    <x-error-message :message="$message" />
                @enderror
            </div>

            <button type="submit"
                class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update
            </button>
        </form>
    </x-auth-card>
@endsection
