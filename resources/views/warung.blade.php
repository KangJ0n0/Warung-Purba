<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Warung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
 
    <x-app-layout>

  

  <header class="relative">
    <img class="w-full h-64 " src="https://ayobangka.com/wp-content/uploads/2023/10/6528dad642a14.jpg" alt="A busy street food stall with various dishes displayed on the walls">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl font-bold">Warung Makan</h1>
    </div>
</header>

<main class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-4">List Warung di Purbalingga</h2>
        <form action="{{ route('foodstalls.index') }}" method="GET">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" value="{{ request()->query('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Warbir, Waren..." required />
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:focus:ring-blue-800">Cari</button>
            </div>
        </form>
        <br>
        @if ($foodstalls->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($foodstalls as $foodstall)
                <a href="{{ route('foodstalls.show', ['foodstall' => $foodstall->id]) }}" class="hover:-translate-y-1 cursor-pointer transition-transform duration-200 transform hover:scale-110">

                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img class="w-full h-32 transition-transform duration-250 transform hover:scale-110" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                            <div class="p-4">
                                <h3 class="font-bold text-lg line-clamp-2">{{ $foodstall->foodstall_name }}</h3>
                                <p class="text-sm text-gray-600 truncate">{{ $foodstall->foodstall_location }}</p>
                              
                                <p class="text-sm text-gray-600 mt-2">
                                    @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
                                        ⭐
                                    @endfor
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p>Warung tidak ditemukan.</p>
        @endif
    </div>
</main>

</x-app-layout>
<x-footer></x-footer>

</body>
</html>
