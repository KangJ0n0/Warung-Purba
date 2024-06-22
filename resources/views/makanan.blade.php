<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Makanan di Warung Purbalingga</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <x-app-layout>
        <header class="relative">
            <img class="w-full h-64 object-cover sm:h-32 md:h-48 lg:h-64" src="https://cdn.sazumi.moe/file/uo3tyu.jpg" alt="A busy street food stall with various dishes displayed on the walls">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-4xl font-bold">Makanan</h1>
            </div>
        </header>

        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-bold mb-4">Semua Makanan di Purbalingga</h2>
                <div class="flex justify-end mb-4">
                    <select class="border border-gray-300 rounded-md p-2">
                        <option>Filter</option>
                    </select>
                    <input type="text" class="border border-gray-300 rounded-md p-2 ml-4" placeholder="Search...">
                </div>
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
            </div>
        </main>
    </x-app-layout>
    <x-footer></x-footer>
</body>
</html>
