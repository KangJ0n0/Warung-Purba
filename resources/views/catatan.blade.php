<x-app-layout>
    <div class="flex flex-col min-h-screen">
        <div class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @auth
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">List Warung</h3>
                        @foreach($favoriteFoodstalls as $favorite)
                        <a href="{{ route('foodstalls.show', $favorite->foodstall_id) }}">
                            <div class="border p-4 mb-4 rounded-md shadow-md hover:shadow-lg">
                                <h4 class="text-lg font-semibold">{{ $favorite->foodstall->foodstall_name }}</h4>
                                <p>{{ $favorite->foodstall->foodstall_location }}</p>
                                <img class="w-full h-48 object-cover mt-2" src="{{ asset('storage/' . $favorite->foodstall->foodstall_pict) }}" alt="{{ $favorite->foodstall->foodstall_name }}">
                                <!-- Add more details as needed -->
                                <form action="{{ route('toggleFavorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="foodstall_id" value="{{ $favorite->foodstall_id }}">
                                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Hapus dari Catatan</button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">List Makanan</h3>
                        @foreach($favoriteFoods as $favorite)
                        <a href="{{ route('foods.show', $favorite->food_id) }}">
                            <div class="border p-4 mb-4 rounded-md shadow-md hover:shadow-lg">
                                <h4 class="text-lg font-semibold">{{ $favorite->food->food_name }}</h4>
                                <img class="w-full h-48 object-cover mt-2" src="{{ asset('storage/' . $favorite->food->food_pict) }}" alt="{{ $favorite->food->food_name }}">
                                <!-- Add more details as needed -->
                                <form action="{{ route('toggleFavorite') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="food_id" value="{{ $favorite->food_id }}">
                                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Hapus</button>
                                </form>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                @else
                    <div class="flex justify-center items-center h-full">
                        <div>
                            <br><br>
                            <br><br>
                            <br><br>
                            <h1 class="text-center text-red-500 font-bold">Login dulu ya buat akses fitur halaman ini</h1>
                            {{-- <div class="text-center">
                                <img src="https://cdn.sazumi.moe/file/3tgwiu.jpg" alt="Return Home" class="mx-auto w-1/2 md:w-1/3 lg:w-1/4">
                            </div> --}}
                            <div class="text-center mt-4">
                                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">Login</a>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</x-app-layout>
