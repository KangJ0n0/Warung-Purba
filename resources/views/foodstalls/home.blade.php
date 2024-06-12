<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
 
  <x-navbar></x-navbar>
  

  <header class="relative">
    <img class="w-full h-64 object-cover" src="https://placehold.co/1920x256" alt="A busy street food stall with various dishes displayed on the walls">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl font-bold">Warung</h1>
    </div>
</header>

<main class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold mb-4">Semua Warung di Purbalingga</h2>
        <div class="flex justify-end mb-4">
            <select class="border border-gray-300 rounded-md p-2">
                <option>Filter</option>
            </select>
            <input type="text" class="border border-gray-300 rounded-md p-2 ml-4" placeholder="Search...">
        </div>
        @if ($foodstalls->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($foodstalls as $foodstall)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-32 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                    <div class="p-4">
                        <h3 class="font-bold text-lg">{{ $foodstall->foodstall_name }}</h3>
                        <p class="text-sm text-gray-600">{{ $foodstall->foodstall_location }}</p>
                        <p class="text-sm text-gray-600">{{ $foodstall->foodstall_desc }}</p>
                        <p class="text-sm text-gray-600 mt-2">Rating {{ $foodstall->foodstall_rating }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No warungs found.</p>
    @endif
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="A food stall grilling various skewers">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Oren</h3>
                    <p class="text-sm text-gray-600">Jl. Blater Sebelah Lapangan Bla...</p>
                    <p class="text-sm text-gray-600">Menjual aneka makanan seperti...</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,8</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="A cozy interior of a small restaurant">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Hijau</h3>
                    <p class="text-sm text-gray-600">Kalimanah Sebelah Lapangan Kali...</p>
                    <p class="text-sm text-gray-600">Menjual aneka makanan seperti...</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,8</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="People buying food at a food stall">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Biru</h3>
                    <p class="text-sm text-gray-600">Jl. Blater Sebelah Kampus Fakul...</p>
                    <p class="text-sm text-gray-600">Menjual aneka makanan seperti...</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,8</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="A food stall grilling skewers with some food items displayed on the counter">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Putih</h3>
                    <p class="text-sm text-gray-600">Kalimanah Wetan No.26 Purbali...</p>
                    <p class="text-sm text-gray-600">Menjual aneka sate-satean</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,5</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="People buying food at a food stall">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Biru</h3>
                    <p class="text-sm text-gray-600">Jl. Blater Sebelah Kampus Fakul...</p>
                    <p class="text-sm text-gray-600">Menjual aneka makanan seperti...</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,8</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="A food stall grilling skewers with some food items displayed on the counter">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Putih</h3>
                    <p class="text-sm text-gray-600">Kalimanah Wetan No.26 Purbali...</p>
                    <p class="text-sm text-gray-600">Menjual aneka sate-satean</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,5</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="People buying food at a food stall">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Biru</h3>
                    <p class="text-sm text-gray-600">Jl. Blater Sebelah Kampus Fakul...</p>
                    <p class="text-sm text-gray-600">Menjual aneka makanan seperti...</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,8</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-32 object-cover" src="https://placehold.co/400x256" alt="A food stall grilling skewers with some food items displayed on the counter">
                <div class="p-4">
                    <h3 class="font-bold text-lg">Warung Putih</h3>
                    <p class="text-sm text-gray-600">Kalimanah Wetan No.26 Purbali...</p>
                    <p class="text-sm text-gray-600">Menjual aneka sate-satean</p>
                    <p class="text-sm text-gray-600 mt-2">Rating 4,5</p>
                </div>
            </div>
        </div>
    </div>
</main>



  

</body>
<x-footer></x-footer>

</html>