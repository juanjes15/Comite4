<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CODES') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 antialiased">
    <x-banner />

    @livewire('navigation-menu')

    <x-sidebar />

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            @if (isset($header))
                <header class="bg-gradient-to-l from-[#39a900] to-green-50 rounded-lg shadow-lg shadow-green-500/40 text-xl text-left max-w-7xl mx-auto py-1 px-2 sm:px-2 lg:px-14">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{ $slot }}
        </div>
    </div>



    @stack('modals')

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>
