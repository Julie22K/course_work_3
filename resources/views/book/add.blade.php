<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання книги') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('books.index')}}'">До списку
                    </button>
                    <form action="{{route('books.store')}}" method="post">
                        @csrf
                        <div class="flex flex-row w-full justify-between">
                            <div class="m-2 w-1/2">
                                <label for="name" class="form-label">Найменування:</label>
                                <input type="text" name="name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="name">
                            </div>
                            <div class="m-2 w-1/2">
                                <label for="author" class="form-label">Автор:</label>
                                <select type="text" name="author" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="author">
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}">{{$author->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between">
                            <div class="m-2 w-1/2">
                                <label for="image" class="form-label">Зображення:</label>
                                <input type="text" name="image" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="image">
                            </div>
                            <div class="m-2 w-1/2">
                                <label for="price" class="form-label">Ціна:</label>
                                <input type="number" min="0" value="0" step="0.01" name="price" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="price">
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between">
                            <div class="m-2 w-1/2">
                                <label for="edition" class="form-label">Видавництво:</label>
                                <select name="edition" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="edition">
                                    @foreach($editions as $edition)
                                        <option value="{{$edition->id}}">{{$edition->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="m-2 w-1/2">
                                <label for="category" class="form-label">Категорія:</label>
                                <select name="category" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="m-2">
                            <label for="description" class="form-label">Короткий опис:</label>
                            <textarea row="3" name="description" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="description"></textarea>
                        </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
