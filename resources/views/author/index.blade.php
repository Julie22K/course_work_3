<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Автори') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('authors.create')}}'">Додати
                    </button>
                    <table id="myTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ім'я</th>
                            <th>Книги</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>
                                    {{$author->id}}
                                </td>
                                <td>
                                    {{$author->full_name}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($author->book_author as $b)
                                            <li>{{$b->book->title}}</li>
                                        @endforeach

                                    </ul>

                                </td>
                                <td class="flex flex-row">
                                    <ion-icon onclick="location.href='{{URL::route('authors.edit',$author->id)}}'"
                                              class="bg-blue-400 rounded-md m-1 p-1 text-white hover:bg-blue-300"
                                              name="create-outline" title="Редагувати"></ion-icon>
                                    <ion-icon
                                        onclick="location.href='{{URL::route('authors.destroy',$author->id)}}'"
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
