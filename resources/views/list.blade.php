<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-8 space-y-10">

        {{-- ADD BOOK --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md">
                <div class="p-6 md:p-8 space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('Add book') }}
                    </h2>

                    <form method="post" action="{{ route('save') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('ISBN') }}
                            </label>
                            <input id="isbn" name="isbn" value="{{ old('isbn') }}" type="text" class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-900 dark:text-gray-100
                               focus:border-indigo-500 focus:ring-indigo-500">
                            @error('isbn')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Title') }}
                            </label>
                            <input id="title" name="title" value="{{ old('title') }}" type="text" class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-900 dark:text-gray-100
                               focus:border-indigo-500 focus:ring-indigo-500">
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pages" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Pages') }}
                            </label>
                            <input id="pages" name="pages" value="{{ old('pages') }}" type="number" class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-900 dark:text-gray-100
                               focus:border-indigo-500 focus:ring-indigo-500">
                            @error('pages')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-primary-button class="w-full justify-center py-3 text-base">
                            {{ __('Save book') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>


        {{-- BOOK LIST --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md">
                <div class="p-6 md:p-8 space-y-6">

                    @if (session('success'))
                        <div
                            class="rounded-lg bg-lime-50 dark:bg-lime-900/20 border border-lime-200 dark:border-lime-700 p-4">
                            <p class="text-lime-600 dark:text-lime-400 font-medium">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('Books') }}
                    </h2>

                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($books as $book)
                            @if ($book->pages < 350)
                                <div class="py-4 flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">
                                            {{ $book->title }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            ISBN: {{ $book->isbn }}
                                        </p>
                                    </div>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $book->pages }} pages
                                    </span>
                                </div>
                            @endif
                        @empty
                            <p class="text-gray-500 dark:text-gray-400">
                                No books found.
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>