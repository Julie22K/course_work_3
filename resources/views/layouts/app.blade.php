<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Table -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <!-- Ion-Icons -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    responsive: true,
                    "language": {
                        "sProcessing":    "Дані обробляються...",
                        "sLengthMenu":    "Показати _MENU_ записів",
                        "sZeroRecords":   "Нічого не знайдено",
                        "sEmptyTable":    "У цій таблиці немає даних",
                        "sInfo":          "Показано з _START_ по _END_ з _TOTAL_ записів",
                        "sInfoEmpty":     "Показано з 0 по 0 з 0 записів",
                        "sInfoFiltered":  "(фільтруючи загальну кількість записів: _MAX_)",
                        "sInfoPostFix":   "",
                        "sSearch":        "Пошук:",
                        "sUrl":           "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Перша",
                            "sLast":    "Остання",
                            "sNext":    "Далі",
                            "sPrevious": "Назад"
                        }}
                });
            });
        </script>
    </body>
</html>
