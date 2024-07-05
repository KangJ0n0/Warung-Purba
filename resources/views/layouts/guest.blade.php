<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>{{ config('app.name', 'Warung Purba') }}</title>
    
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
    
        <body class="font-sans text-gray-900 antialiased">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center" style="background-image: url('https://radarbanyumas.disway.id/upload/9929e02441e39fafd95437ac1bf22683.jpg');">
                <div>
                    <a href="/" wire:navigate>
                        <img src="https://cdn.sazumi.moe/file/is4kxw.png" class="w-20 h-20 fill-current text-gray-500 rounded-full transition duration-300 transform hover:rotate-360" />
                    </a>
                
                </div>
    
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-70 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </body>
    </html>
    </x-app-layout>
    