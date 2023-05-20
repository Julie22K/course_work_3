<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання жанру') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('genres.index')}}'">До списку
                    </button>
                    <form action="{{route('genres.store')}}" method="post">
                        @csrf
                        <div class="m-2 w-full">
                            <label for="name" class="form-label">Назва жанру:</label>
                            <input type="text" name="name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="name">
                        </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
