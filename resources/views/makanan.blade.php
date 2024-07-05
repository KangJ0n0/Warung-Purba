<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makanan</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <x-app-layout>
        <header class="relative">
            <img class="w-full h-64 sm:h-32 md:h-48 lg:h-64" src="https://cdn.sazumi.moe/file/uo3tyu.jpg" alt="A busy street food stall with various dishes displayed on the walls">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-4xl font-bold">Makanan</h1>
            </div>
        </header>

        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-bold mb-4">Berbagai Makanan di Warung Purbalingga</h2>

                <!-- Search form -->
                <form action="{{ route('foods.index') }}" method="GET" class="mb-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari makanan..." required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:focus:ring-blue-800">Cari</button>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        // Array to store seen food names
                        $seenFoodNames = [];
                    @endphp

                    @foreach ($foods->sortBy('id') as $food)
                        @if (!in_array($food->food_name, $seenFoodNames))
                            @php
                                // Add current food name to seen list
                                $seenFoodNames[] = $food->food_name;
                            @endphp

                            <a href="{{ route('foods.show', $food->id) }}" class="block">
                                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:-translate-y-1 cursor-pointer transition-transform duration-200 transform hover:scale-110">
                                    <div class="p-4">
                                        <img class="w-full h-32 object-cover" src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="font-bold text-lg">{{ $food->food_name }}</h3>
                                    </div>
                                </div>
                            </a>
                            
                        @endif
                        
                    @endforeach
                </div>
            
                <div class="mt-8">
                    {{ $foods->links() }} <!-- Menampilkan tombol-tombol pagination -->
                </div>
            </div>
        </main>
    </x-app-layout>
    <x-footer></x-footer>
</body>
</html>
