<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Продажі') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="bg-green-400 rounded-md m-2 p-2 px-2 text-white hover:bg-green-300"
                            onclick="location.href='{{URL::route('sales.create')}}'">Додати
                    </button>
                    <table id="myTable">
                        <thead>
                        <tr>
                            <th>Адреса магазину</th>
                            <th>Продавець</th>
                            <th>Покупець</th>
                            <th>Продані книги</th>
                            <th>Виручка</th>
                            <th>Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>
                                    {{$sale->shop->address}}
                                </td>
                                <td>
                                    {{$sale->employer->full_name}}
                                </td>
                                <td>
                                    {{$sale->consumer->full_name}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($sale->items as $item)

                                                <li>{{$item->inventory_book->book->title}} - {{$item->inventory_book->order_price}} грн</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <?php
                                        $sum=0;
                                        foreach ($sale->items as $item)
                                        {
                                            $sum+=$item->price-$item->inventory_book->order_price;//todo with виручка
                                            //переробити таблицю, або з групуванням по продажі
                                        }
                                        echo $sum . "грн";

                                        ?>
                                </td>
                                <td class="flex flex-row">
                                    <ion-icon onclick="location.href='{{URL::route('sales.edit',$sale->id)}}'"
                                              class="bg-blue-400 rounded-md m-1 p-1 text-white hover:bg-blue-300"
                                              name="create-outline" title="Редагувати"></ion-icon>
                                    <ion-icon
                                        onclick="location.href='{{URL::route('sales.destroy',$sale->id)}}'"
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
