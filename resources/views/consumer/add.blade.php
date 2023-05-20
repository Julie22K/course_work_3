<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання клієнта') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('consumers.index')}}'">До списку
                    </button>
                    <form action="{{route('consumers.store')}}" method="post">
                        @csrf
                        <div class="flex flex-row w-full justify-between">
                            <div class="m-2 w-1/2">
                            <label for="full_name" class="form-label">ПІБ:</label>
                            <input type="text" name="full_name" class="border border-gray-400 px-4 py-2 rounded  focus:outline-none focus:border-teal-400" id="full_name">
                            </div>
                                <div class="m-2 w-1/2">
                                <label for="phone" class="form-label">Номер телефону:</label>
                            <input type="text" name="phone" class="border border-gray-400 px-4 py-2 rounded  focus:outline-none focus:border-teal-400" id="phone">
                                </div>
                                </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
