<x-app-layout>
    <x-slot name="header">
       <h3>Detail Warung</h3>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-96 " src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}">
                <div class="p-6">
                    <form action="{{ route('favorites.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $food->id }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Bookmark
                        </button>
                    </form>

                    @php
                        // Retrieve all foods with the same food_name as the current food
                        $relatedFoods = \App\Models\Food::where('food_name', $food->food_name)->get();
                    @endphp

                    @if ($relatedFoods->isNotEmpty())
                        <div class="bg-gray-100 p-4 rounded-lg mt-4">
                            <h3 class="text-lg font-bold mb-2">Tersedia di</h3>
                            @foreach ($relatedFoods as $relatedFood)
                                @if ($relatedFood->foodstall)
                                    <div class="mb-4">
                                        <h4 class="text-lg font-bold">{{ $relatedFood->foodstall->foodstall_name }}</h4>
                                        <img class="w-full h-32 object-cover mb-2" src="{{ asset('storage/' . $relatedFood->foodstall->foodstall_pict) }}" alt="{{ $relatedFood->foodstall->foodstall_name }}">
                                        <p class="text-sm text-gray-600 mb-2">{{ $relatedFood->foodstall->foodstall_location }}</p>
                                        <p class="text-sm text-gray-600 mb-2">{{ $relatedFood->foodstall->foodstall_desc }}</p>
                                        <p class="text-sm text-gray-600 mb-2">Contact: {{ $relatedFood->foodstall->foodstall_contact }}</p>
                                        <p class="text-sm text-gray-600 mb-2">
                                            @for ($i = 0; $i < $relatedFood->foodstall->foodstall_rating; $i++)
                                                ⭐
                                            @endfor
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p class="text-red-500 mt-4">No other foods found with the same name.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
