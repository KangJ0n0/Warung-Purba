@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Detail Warung Makan</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                <div class="p-6 flex justify-between items-start">
                    <div class="max-w-lg">
                        <h2 class="text-3xl font-bold mb-2 text-blue-700">{{ $foodstall->foodstall_name }}</h2>
                        <p class="text-lg text-gray-700 mb-4">{{ $foodstall->foodstall_location }}</p>
                        <p class="text-sm text-gray-600 mb-4">{{ $foodstall->foodstall_desc }}</p>
                        <p class="text-sm text-gray-600 mb-2"><strong>Kontak:</strong> {{ $foodstall->foodstall_contact }}</p>
                        <br>
                        <div class="flex items-center mb-4 text-2xl">
                            @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
                                <span class="text-yellow-500">⭐</span>
                            @endfor
                        </div>
                    </div>
                    <form action="{{ route('favorites.store') }}" method="POST" class="self-center">
                        @csrf
                        <input type="hidden" name="foodstall_id" value="{{ $foodstall->id }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">
                            Catat
                        </button>
                    </form>
                </div>
            </div>
            
            

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Semua Makanan di {{ $foodstall->foodstall_name }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($foodstall->foods as $food)
                        @if ($food->foodstall_id === $foodstall->id)
                            <a href="{{ route('foods.show', ['id' => $food->id]) }}" class="bg-gray-100 rounded-lg shadow-md overflow-hidden transition duration-300 transform cursor-pointer hover:shadow-lg">
                                <img src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold mb-2">{{ $food->food_name }}</h4>
                                    <p class="text-gray-600">{{ $food->food_price }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>                
            </div>

            @php
            $totalReviews = $foodstall->reviews->count();
            $averageRating = $totalReviews > 0 ? $foodstall->reviews->avg('rating') : 0;
        @endphp

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Ulasan ({{ $totalReviews }})</h3>

              
                <div class="mb-4">
                   
                    <p class="text-sm text-gray-600">Rata-Rata rating pengguna :
                        @for ($i = 0; $i < round($averageRating); $i++)
                            <span class="text-yellow-500">⭐</span>
                        @endfor
                        ({{ number_format($averageRating, 1) }})
                    </p>
                </div>

                <div class="max-w-full mx-auto mt-10 space-y-6">
                    @forelse ($foodstall->reviews as $review)
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white">
                                    @php
                                        // Determine the picture URL
                                        $userPictureUrl = $review->user->picture;
                                        if (!str_starts_with($userPictureUrl, 'http')) {
                                            $userPictureUrl = asset('storage/' . $userPictureUrl);
                                        }
                                    @endphp
                                    <a href="{{ route('users.show', $review->user->id) }}">
                                        <img class="w-12 h-12 rounded-full object-cover" src="{{ $userPictureUrl }}" alt="{{ $review->user->name }}">
                                    </a>
                                </div>
                                <div class="ml-4">
                                    <a href="{{ route('users.show', $review->user->id) }}">
                                    <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">{{ $review->user->name }}</h1>
                                    </a>
                                    <div class="flex mt-2">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-md text-gray-600 mb-4">{{ $review->comment }}</p>
                            @if ($review->picture)
                                <img src="{{ asset('storage/' . $review->picture) }}" alt="Review Picture" class="w-20 h-20 object-cover rounded-md">
                            @endif
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-semibold">
                                <span class="font-normal">{{ $review->created_at->locale('id')->diffForHumans() }}</span>
                                </div>
                                @if (Auth::check() && (Auth::id() === $review->user_id || Auth::user()->role === 'admin'))
                                    <div class="mt-2 flex space-x-2">
                                        <a href="{{ route('reviews.edit', $review->id) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin hapus Ulasan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-600">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
            
            @auth
                <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
                    <h3 class="text-xl font-bold mb-4">Tambahkan Ulasan</h3>
                    <form method="POST" action="{{ route('reviews.store', $foodstall->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <div x-data="{ currentVal: 3 }" class="flex items-center gap-1">
                                <label for="oneStar" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">satu bintang</span>
                                    <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating" value="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 0 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M12 17.25l6.18 3.525-1.64-7.035 5.46-4.74-7.14-.615L12 2.25l-2.86 6.135-7.14.615 5.46 4.74-1.64 7.035L12 17.25z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                <label for="twoStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">dua bintang</span>
                                    <input x-model="currentVal" id="twoStars" type="radio" class="sr-only" name="rating" value="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 1 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M12 17.25l6.18 3.525-1.64-7.035 5.46-4.74-7.14-.615L12 2.25l-2.86 6.135-7.14.615 5.46 4.74-1.64 7.035L12 17.25z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                <label for="threeStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">tiga bintang</span>
                                    <input x-model="currentVal" id="threeStars" type="radio" class="sr-only" name="rating" value="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 2 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M12 17.25l6.18 3.525-1.64-7.035 5.46-4.74-7.14-.615L12 2.25l-2.86 6.135-7.14.615 5.46 4.74-1.64 7.035L12 17.25z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                <label for="fourStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">empat bintang</span>
                                    <input x-model="currentVal" id="fourStars" type="radio" class="sr-only" name="rating" value="4">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 3 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M12 17.25l6.18 3.525-1.64-7.035 5.46-4.74-7.14-.615L12 2.25l-2.86 6.135-7.14.615 5.46 4.74-1.64 7.035L12 17.25z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                                <label for="fiveStars" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                    <span class="sr-only">lima bintang</span>
                                    <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only" name="rating" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal > 4 ? 'text-amber-500' : 'text-slate-700 dark:text-slate-300'">
                                        <path fill-rule="evenodd" d="M12 17.25l6.18 3.525-1.64-7.035 5.46-4.74-7.14-.615L12 2.25l-2.86 6.135-7.14.615 5.46 4.74-1.64 7.035L12 17.25z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Komentar</label>
                            <textarea name="comment" id="comment" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
                            <input type="file" name="picture" id="picture" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            @endauth

        </div>
    </main>
</x-app-layout>
