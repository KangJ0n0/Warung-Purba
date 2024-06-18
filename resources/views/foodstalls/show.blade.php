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
                <div class="p-6 flex justify-between items-start">
                    <div>
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
                    <form action="{{ url('bookmark', $foodstall->id) }}" method="POST" class="ml-4">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Bookmark</button>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Semua Makanan di Warung ({{ $foodstall->foodstall_name }})</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($foodstall->foods as $food)
                        @if ($food->foodstall_id === $foodstall->id)
                            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold mb-2">{{ $food->food_name }}</h4>
                                    <p class="text-gray-600">{{ $food->food_price }}</p>
                                </div>
                            </div>
                        @endif
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
                        @if (Auth::check() && (Auth::id() === $review->user_id || Auth::user()->role === 'admin'))
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
                            <div x-data="{ currentVal: 3 }" class="flex items-center gap-1">
                                <label for="oneStar" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">one star</span>
                                    <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 0 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd">
                                    </svg>
                                </label>

                                <label for="twoStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">two stars</span>
                                    <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 1 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd">
                                    </svg>
                                </label>

                                <label for="threeStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">three stars</span>
                                    <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 2 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd">
                                    </svg>
                                </label>

                                <label for="fourStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">four stars</span>
                                    <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 3 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd">
                                    </svg>
                                </label>

                                <label for="fiveStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">five stars</span>
                                    <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 4 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd">
                                    </svg>
                                </label>
                            </div>
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
