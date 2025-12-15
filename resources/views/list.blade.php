<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('list') }}
        </h2>
    </x-slot>

    <div class="mt-6 space-y-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg md:text-xl lg:text-2xl"> {{__('Add book') }}</h2>

                    <form method="post" action="{{url('save')}}">
                        @csrf

                        <div>
                            <label for="isbn"> {{ __('isbn') }}</label>
                            <input type="text" name="isbn" id="isbn"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div>
                            <label for="title"> {{ __('Title') }}</label>
                            <input type="text" name="title" id="title"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div>
                            <label for="pages"> {{ __('Pages') }}</label>
                            <input type="text" name="pages" id="pages"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div>
                            <x-primary-button>{{ __('SAVE') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg md:text-xl lg:text-2xl"> {{__('books') }}</h2>

                    @foreach($books as $book)
                        @if ($book->pages < 350)
                            <div>
                                {{$book->isbn}} - {{$book->title}}
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>


</x-app-layout>