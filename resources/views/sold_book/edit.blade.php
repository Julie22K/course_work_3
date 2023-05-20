<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редагування книги') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('books.index')}}'">До списку
                    </button>
                    <form action="{{route('books.store',$book->id)}}" method="post">
                        @csrf
                        <div class="m-2 w-full">
                            <label for="title" class="form-label">Найменування:</label>
                            <input type="text" name="title" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="title" value="{{$book->title}}">
                        </div>

                        <div class="flex flex-row w-full justify-between">
                            <select name="genre" class="border border-gray-400 m-2 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="genre">
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}" {{-- @selected($good->unit_id == $unit->id)--}}>{{$genre->name}}</option>
                                @endforeach
                            </select>
                            <select name="author" class="border border-gray-400 m-2 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" id="author">
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}"{{-- @selected($good->unit_id == $unit->id)--}}>{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
