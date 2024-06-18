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
                    @if ($food->foodstall)
                        <div class="bg-gray-100 p-4 rounded-lg mt-4">
                            <h3 class="text-lg font-bold mb-2">Foodstall Information</h3>
                            <img class="w-full h-32 object-cover mb-4" src="{{ asset('storage/' . $food->foodstall->foodstall_pict) }}" alt="{{ $food->foodstall->foodstall_name }}">
                            <p class="text-sm text-gray-600 mb-2">{{ $food->foodstall->foodstall_location }}</p>
                            <p class="text-sm text-gray-600 mb-4">{{ $food->foodstall->foodstall_desc }}</p>
                            <p class="text-sm text-gray-600 mb-2">Contact: {{ $food->foodstall->foodstall_contact }}</p>
                            <p class="text-sm text-gray-600 mb-4">
                                @for ($i = 0; $i < $food->foodstall->foodstall_rating; $i++)
                                    ⭐
                                @endfor
                            </p>
                        </div>
                    @else
                        <p class="text-red-500 mt-4">Foodstall information not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
