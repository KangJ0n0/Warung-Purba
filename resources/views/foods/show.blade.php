<!-- resources/views/foods/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">{{ $food->food_name }}</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}">
                <div class="p-6">
                    <p class="text-sm text-gray-600 mb-2">Price: Rp {{ number_format($food->food_price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-600 mb-4">From: {{ $food->foodstall->foodstall_name }}</p>
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
