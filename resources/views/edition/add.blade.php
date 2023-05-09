<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання видавництва') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('editions.index')}}'">До списку
                    </button>
                    <form action="{{route('editions.store')}}" method="post">
                        @csrf
                        <div class="flex flex-row justify-between">
                            <div class="m-2">
                                <label for="name" class="form-label">Найменування:</label>
                                <input type="text" name="name" class="border border-gray-400 px-4 py-2 w-1/2 rounded focus:outline-none focus:border-teal-400" id="name">
                            </div>
                            <div class="m-2">
                                <label for="address" class="form-label">Адреса:</label>
                                <input type="text" name="address" class="border border-gray-400 px-4 py-2 w-1/2 rounded focus:outline-none focus:border-teal-400" id="address">
                            </div>
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="m-2">
                                <label for="phone" class="form-label">Телефон:</label>
                                <input type="tel" name="phone" class="border border-gray-400 px-4 py-2 rounded w-1/2 focus:outline-none focus:border-teal-400" id="phone">
                            </div>
                            <div class="m-2">
                                <label for="email" class="form-label">Електрона адреса:</label>
                                <input type="email" name="email" class="border border-gray-400 px-4 py-2 rounded w-1/2 focus:outline-none focus:border-teal-400" id="email">
                            </div>
                        </div>

                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
