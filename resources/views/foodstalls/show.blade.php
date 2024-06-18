@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">{{ $foodstall->foodstall_name }}</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                <div class="p-6">
                    <h2 class="text-3xl font-bold mb-2">{{ $foodstall->foodstall_name }}</h2>
                    <p class="text-lg text-gray-700 mb-4">{{ $foodstall->foodstall_location }}</p>
                    <p class="text-sm text-gray-600 mb-4">{{ $foodstall->foodstall_desc }}</p>
                    <p class="text-sm text-gray-600 mb-2">Contact: {{ $foodstall->foodstall_contact }}</p>
                    <div class="flex items-center mb-4">
                        @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
                            <span class="text-yellow-500">⭐</span>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Semua Makanan di Warung ({{ $foodstall->foodstall_name }})</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($foodstall->foods as $food)
                        <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="text-lg font-semibold mb-2">{{ $food->food_name }}</h4>
                                <p class="text-gray-600">{{ $food->food_price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Reviews</h3>
                @forelse ($foodstall->reviews as $review)
                    <div class="border-b border-gray-200 mb-4 pb-4">
                        <p class="text-sm text-gray-600"><strong>{{ $review->user->name }}</strong> rated:</p>
                        <p class="text-sm text-gray-600 mb-2">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <span class="text-yellow-500">⭐</span>
                            @endfor
                        </p>
                        <p class="text-sm text-gray-600">{{ $review->comment }}</p>
                        @if ($review->picture)
                            <img src="{{ asset('storage/' . $review->picture) }}" alt="Review Picture" class="mt-2">
                        @endif
                        @if (Auth::id() === $review->user_id || Auth::user()->role === 'admin')
                            <div class="mt-2 flex space-x-2">
                                <a href="{{ route('reviews.edit', $review->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-sm text-gray-600">No reviews yet.</p>
                @endforelse
            </div>

            @auth
                <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
                    <h3 class="text-xl font-bold mb-4">Add a Review</h3>
                    <form method="POST" action="{{ route('reviews.store', $foodstall->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="1">1 ⭐</option>
                                <option value="2">2 ⭐</option>
                                <option value="3">3 ⭐</option>
                                <option value="4">4 ⭐</option>
                                <option value="5">5 ⭐</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                            <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Picture</label>
                            <input id="picture" name="picture" type="file" class="mt-1 block w-full">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Submit Review</button>
                        </div>
                    </form>
                </div>
            @else
                <p class="text-sm text-gray-600 mt-4">Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to add a review.</p>
            @endauth
        </div>
    </main>
</x-app-layout>
