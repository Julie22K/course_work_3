<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання книги в магазин') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('inventory_books.index')}}'">До списку
                    </button>
                    <form action="{{route('inventory_books.store')}}" method="post">
                        @csrf
                        <div class="flex flex-row justify-between">
                            <div class="m-2 w-1/2">
                                <label for="book" class="form-label">Книга:</label>
                            <select name="book" class="border border-gray-400 m-2 px-4 py-2 w-full rounded focus:outline-none focus:border-teal-400" id="book">
                                @foreach($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}} {{$book->book_author[0]->author->full_name}}</option>
                                @endforeach
                            </select></div>
                            <div class="m-2 w-1/2">
                            <label for="shop" class="form-label">Магазин:</label>
                            <select name="shop" class="border border-gray-400 m-2 px-4 py-2 w-full rounded focus:outline-none focus:border-teal-400" id="shop">
                                @foreach($shops as $shop)
                                    <option value="{{$shop->id}}">{{$shop->address}}</option>
                                @endforeach
                            </select></div>
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="m-2 w-1/2">
                                <label for="order_price" class="form-label">Ціна при замовлені:</label>
                                <input type="number" step="0.25" min="0"  name="order_price" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="order_price">
                            </div>
                            <div class="m-2 w-1/2">
                                <label for="order_date" class="form-label">Дата при замовлені:</label>
                                <input type="datetime-local" name="order_date" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="order_date">
                            </div>
                        </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
