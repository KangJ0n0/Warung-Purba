<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Bookmarks</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Favorite Foodstalls</h3>
                @foreach(Auth::user()->favoriteFoodstalls as $foodstall)
                    <div class="border p-4 mb-4 rounded-md shadow-md">
                        <h4 class="text-lg font-semibold">{{ $foodstall->foodstall_name }}</h4>
                        <p>{{ $foodstall->foodstall_location }}</p>
                        <!-- Add more details as needed -->
                        <form action="{{ route('foodstalls.toggleFavorite', $foodstall->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Remove from Favorites</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Favorite Foods</h3>
                @foreach(Auth::user()->favoriteFoods as $food)
                    <div class="border p-4 mb-4 rounded-md shadow-md">
                        <h4 class="text-lg font-semibold">{{ $food->food_name }}</h4>
                     
                        <!-- Add more details as needed -->
                        <form action="{{ route('foods.toggleFavorite', $food->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Remove from Favorites</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
