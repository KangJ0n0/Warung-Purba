@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Bookmarks</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Favorite Foodstalls</h3>
                @foreach($favoriteFoodstalls as $favorite)
                    <div class="border p-4 mb-4 rounded-md shadow-md">
                        <h4 class="text-lg font-semibold">{{ $favorite->foodstall->foodstall_name }}</h4>
                        <p>{{ $favorite->foodstall->foodstall_location }}</p>
                        <!-- Add more details as needed -->
                        <form action="{{ route('toggleFavorite') }}" method="POST">
                            @csrf
                            <input type="hidden" name="foodstall_id" value="{{ $favorite->foodstall_id }}">
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Remove from Favorites</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Favorite Foods</h3>
                @foreach($favoriteFoods as $favorite)
                    <div class="border p-4 mb-4 rounded-md shadow-md">
                        <h4 class="text-lg font-semibold">{{ $favorite->food->food_name }}</h4>
                        <!-- Add more details as needed -->
                        <form action="{{ route('toggleFavorite') }}" method="POST">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $favorite->food_id }}">
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Remove from Favorites</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
@else
<P>lOGIN DULU</P>
@endauth