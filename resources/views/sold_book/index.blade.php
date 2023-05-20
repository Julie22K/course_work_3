
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Книги') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('books.create')}}'">Додати
                    </button>
                    <table id="myTable">
                        <thead>
                        <tr>
                            <th>Назва</th>
                            <th>Автор</th>
                            <th>Жанр</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
{{--todo check this page--}}
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        {{$book->title}}
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($book->book_author as $author)
                                                <li>{{$author->author->full_name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td><ul>
                                        @foreach($book->book_genre as $genre)
                                                <li>  {{$genre->genre->name}} </li>
                                        @endforeach </ul>
                                    </td>
                                    <td class="flex flex-row">
                                        <ion-icon onclick="location.href='{{URL::route('books.edit',$book->id)}}'"
                                                  class="bg-blue-400 rounded-md m-1 p-1 text-white hover:bg-blue-300"
                                                  name="create-outline" title="Редагувати"></ion-icon>
                                        <ion-icon
                                            onclick="location.href='{{URL::route('books.destroy',$book->id)}}'"
                                            class="bg-red-400 rounded-md m-1 p-1 text-white hover:bg-red-300"
                                            name="trash-outline" title="Видалити"></ion-icon>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



