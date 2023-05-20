<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додавання продажу') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('sales.index')}}'">До списку
                    </button>
                    <form action="{{route('sales.store')}}" method="post">
                        @csrf
                        <div class="flex flex-row justify-between flex-wrap">
                            <div class="m-2 w-1/3">
                                <label for="consumer" class="form-label">Покупець:</label>
                                <select name="consumer" class="select2 border border-gray-400 m-2 px-4 py-2 w-full rounded focus:outline-none focus:border-teal-400" id="consumer">
                                    @foreach($consumers as $consumer)
                                        <option value="{{$consumer->id}}">{{$consumer->full_name}}  -   {{$consumer->phone}}</option>
                                    @endforeach
                                </select></div>
                            <div class="m-2 w-1/3">
                                <label for="employer" class="form-label">Працівник:</label>
                                <select name="employer" class="select2 border border-gray-400 m-2 px-4 py-2 w-full rounded focus:outline-none focus:border-teal-400" id="employer">
                                    @foreach($employee as $employer)
                                        <option value="{{$employer->id}}">{{$employer->full_name}}</option>
                                    @endforeach
                                </select></div>
                            <div class="m-2 w-1/3">
                                <label for="date" class="form-label">Дата:</label>
                                <input type="datetime-local" value="today" name="date" class="border border-gray-400 px-4 m-t-0 py-2 w-full rounded focus:outline-none focus:border-teal-400" style="height: 30px" id="date">

                            </div>
                        </div>
                        <div class="flex flex-row justify-between">

                            {{--<div class="m-2 w-1/2">
                                <label for="shop" class="form-label">Магазин:</label>
                                <select name="shop" class="select2 border border-gray-400 m-2 px-4 py-2 w-full rounded focus:outline-none focus:border-teal-400" id="shop">
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->address}}</option>
                                    @endforeach
                                </select>
                            </div>--}}

                        </div>
                        {{--інтерактивна форма додавання:
                        1.Список динамічний
                        2.Наповнення списку товарів, змінюється в залежності від магазину
https://codeanddeploy.com/blog/laravel/laravel-8-ajax-example-step-by-step-tutorial
                        --}}

                            <div class="m-2">

                                <table id="booksTable">
                                    <thead>
                                    <tr>
                                        <th></th>{{--зробити табличку зі скролом, що буде --}}
                                        <th>Книга</th>
                                        <th>Автор(-и)</th>
                                        {{--<th>Жанр</th>--}}
                                        <th>Ціна</th>
                                        <th>Дата закупки</th>
                                        {{--<th>Ціна закупки</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inventory_books as $inventory_book)
                                        <tr>
                                            <td>
                                                <label for="book_{{$inventory_book->id}}"></label>
                                                <input name="books[]" type="checkbox" id="book_{{$inventory_book->id}}" value="{{$inventory_book->id}}">
                                            </td>
                                            <td>{{$inventory_book->book->title}}</td>

                                            <td>
                                                @foreach($inventory_book->book->book_author as $b_a)
                                                    {{$b_a->author->full_name}},
                                                @endforeach

                                                </td>
                                            <td>{{$inventory_book->order_price*1.3}}</td>
                                            <td>{{$inventory_book->order_date}}</td>
                                          {{--  <td>{{$inventory_book->order_price}}</td>--}}
                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>

                            </div>
                        <button type="submit" class="bg-green-400 rounded-md m-2 p-2 w-1/6 text-white hover:bg-green-300 float-right">Додати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
