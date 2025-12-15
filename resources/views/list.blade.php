<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-10 space-y-12">

        {{-- ADD BOOK --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-900/60 backdrop-blur rounded-2xl border border-gray-200/60 dark:border-gray-700/60 shadow-sm">
                <div class="p-6 md:p-8 space-y-8">
                    <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                        {{ __('Add book') }}
                    </h2>

                    <form method="post" action="{{ route('save') }}" class="space-y-6">
                        @csrf

                        {{-- ISBN --}}
                        <div class="space-y-1">
                            <label for="isbn" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('ISBN') }}
                            </label>
                            <input id="isbn" name="isbn" type="text" value="{{ old('isbn') }}" class="block w-full rounded-xl border-gray-300 dark:border-gray-700
                                       bg-white/60 dark:bg-gray-900/50
                                       text-gray-900 dark:text-gray-100
                                       focus:border-indigo-500 focus:ring-indigo-500 transition">
                            @error('isbn')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TITLE --}}
                        <div class="space-y-1">
                            <label for="title" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Title') }}
                            </label>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" class="block w-full rounded-xl border-gray-300 dark:border-gray-700
                                       bg-white/60 dark:bg-gray-900/50
                                       text-gray-900 dark:text-gray-100
                                       focus:border-indigo-500 focus:ring-indigo-500 transition">
                            @error('title')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PAGES --}}
                        <div class="space-y-1">
                            <label for="pages" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Pages') }}
                            </label>
                            <input id="pages" name="pages" type="number" value="{{ old('pages') }}" class="block w-full rounded-xl border-gray-300 dark:border-gray-700
                                       bg-white/60 dark:bg-gray-900/50
                                       text-gray-900 dark:text-gray-100
                                       focus:border-indigo-500 focus:ring-indigo-500 transition">
                            @error('pages')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-primary-button
                            class="w-full justify-center py-3 text-base transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
                            {{ __('Save book') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>

        {{-- BOOK LIST --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-900/60 backdrop-blur rounded-2xl border border-gray-200/60 dark:border-gray-700/60 shadow-sm">
                <div class="p-6 md:p-8 space-y-8">

                    @if (session('success'))
                        <div class="flex items-center gap-3 rounded-xl bg-lime-50/80 dark:bg-lime-900/20 px-4 py-3">
                            <div class="w-2 h-2 rounded-full bg-lime-500"></div>
                            <p class="text-lime-700 dark:text-lime-400 font-medium">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                            {{ __('Books') }}
                        </h2>
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $books->count() }} total
                        </span>
                    </div>

                    <div class="space-y-3">
                        @forelse ($books as $book)
                            @if ($book->pages < 350)
                                <div
                                    class="group relative overflow-hidden rounded-xl bg-white/50 dark:bg-gray-900/40 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 hover:bg-gray-50 dark:hover:bg-gray-800/70">

                                    {{-- CONTENT --}}
                                    <div
                                        class="flex items-center justify-between px-4 py-3 transition-all duration-300 group-hover:pr-14">
                                        <div class="space-y-0.5">
                                            <p
                                                class="font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                                {{ $book->title }}
                                            </p>
                                            <p class="text-xs text-gray-500 tracking-wide">
                                                ISBN: {{ $book->isbn }}
                                            </p>
                                        </div>

                                        <span
                                            class="text-xs font-medium px-2.5 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/40 group-hover:text-indigo-700 dark:group-hover:text-indigo-300 transition-colors">
                                            {{ $book->pages }} pages
                                        </span>
                                    </div>

                                    {{-- TRASH ACTION --}}
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center translate-x-full group-hover:translate-x-0 transition-all duration-300 ease-out pr-3">
                                        <button
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition">
                                            <x-trash class="w-5 h-5" />
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-12">
                                <p class="text-gray-500 dark:text-gray-400">
                                    No books found.
                                </p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>