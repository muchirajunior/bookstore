<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Books') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="p-6 bg-gray-800 text-white">
        
        <nav class="mb-8 pb-4 border-b border-gray-700">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-bold text-blue-400">My Books</h1>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-blue-300 transition-colors">Home</a>
                   <livewire:create-book/>
                </div>
            </div>
        </nav>
        <livewire:book-list />
    </body>
</html>
