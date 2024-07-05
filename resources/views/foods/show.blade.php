<x-app-layout>
 

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_pict }}">
                
                <div class="p-6 flex justify-between items-start">
                    <h1 class="text-3xl font-bold mb-4">{{ $food->food_name }}</h1>
                    <div>
                        <form action="{{ route('favorites.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $food->id }}">
               
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">
                                Catat
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-6">
                    @php
                        // Retrieve all foods with the same food_name as the current food
                        $relatedFoods = \App\Models\Food::where('food_name', $food->food_name)->get();
                    @endphp

@if ($relatedFoods->isNotEmpty())
<div class="bg-gray-100 p-4 rounded-lg mt-4">
    <h3 class="text-lg font-bold mb-2">Tersedia di</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($relatedFoods as $relatedFood)
            @if ($relatedFood->foodstall)
                <a href="{{ route('foodstalls.show', ['foodstall' => $relatedFood->foodstall->id]) }}" class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300 cursor-pointer block">
                    <h4 class="text-lg font-bold p-4">{{ $relatedFood->foodstall->foodstall_name }}</h4>
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $relatedFood->foodstall->foodstall_pict) }}" alt="{{ $relatedFood->foodstall->foodstall_name }}">
                    <div class="p-4">
                        <p class="text-sm text-gray-600 mb-2">{{ $relatedFood->foodstall->foodstall_location }}</p>
                        @for ($i = 0; $i < $relatedFood->foodstall->foodstall_rating; $i++)
                            ⭐
                        @endfor
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
@else
                        <p class="text-red-500 mt-4">Belum ada/tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
