@extends('layouts.app')

@section('content')
    {{-- User Profile --}}
    <section id="user-profile" class="p-6 max-w-screen-lg mx-auto">
        <div
            class="flex flex-col md:flex-row items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full p-5 mb-3 max-w-screen-lg mx-auto dark:border-gray-700 dark:bg-gray-800 relative">
            <div class="flex flex-col flex-grow">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center md:text-left">
                        User Profile
                    </h2>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="py-2 text-base font-bold text-gray-900 dark:text-white">
                            Name
                        </h3>
                        <p class="text-medium text-gray-700 dark:text-gray-300">
                            {{ $user->name }}
                        </p>
                    </div>
                    <div>
                        <h3 class="py-2 text-base font-bold text-gray-900 dark:text-white">
                            Username
                        </h3>
                        <p class="text-medium text-gray-700 dark:text-gray-300">
                            &commat;{{ $user->username }}
                        </p>
                    </div>
                    <div>
                        <h3 class="py-2 text-base font-bold text-gray-900 dark:text-white">
                            Age
                        </h3>
                        <p class="text-medium text-gray-700 dark:text-gray-300">
                            {{ $user->age }}
                        </p>
                    </div>
                    <div>
                        <h3 class="py-2 text-base font-bold text-gray-900 dark:text-white">
                            Balance
                        </h3>
                        <p class="text-medium text-gray-700 dark:text-gray-300">
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                Rp {{ number_format($user->balance) }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="flex justify-center mt-8 md:justify-end">
                    <a href="{{ route('users.edit') }}">
                        <button
                            class="px-4 py-2 text-sm font-medium text-white bg-primary-500 hover:bg-primary-600 rounded-lg focus:outline-none">
                            Edit Profile
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Top Up Balance Form --}}
    <section id="top-up-balance" class="p-6 max-w-screen-lg mx-auto">
        <div
            class="flex flex-col md:flex-row items-center justify-center bg-white border border-gray-200 rounded-lg shadow-lg w-full p-5 mb-3 max-w-screen-lg mx-auto dark:border-gray-700 dark:bg-gray-800 relative">
            <div class="flex flex-col flex-grow">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center md:text-left">
                        Top Up Balance
                    </h2>
                </div>
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2 flex items-center">
                            <span class="mr-2 text-base font-medium text-gray-900 dark:text-white">
                                Rp
                            </span>
                            <input type="number" name="amount" id="amount"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                            @error('amount')
                                <x-error-message :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-center mt-8 md:justify-end">
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-primary-500 hover:bg-primary-600 rounded-lg focus:outline-none">
                            Top Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
