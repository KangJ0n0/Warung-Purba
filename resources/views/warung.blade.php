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
            <form action="{{route('search')}}" method="get">
                <input type="search" name="search" class="border border-gray-300 rounded-md p-2 ml-4" placeholder="Search...">
            </form>
        </div>
        @if ($foodstalls->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($foodstalls as $foodstall)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-32 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                    <div class="p-4">
                        <h3 class="font-bold text-lg line-clamp-2">{{ $foodstall->foodstall_name }}</h3>
                        <p class="text-sm text-gray-600 truncate">{{ $foodstall->foodstall_location }}</p>
                        <p class="text-sm text-gray-600 truncate">{{ $foodstall->foodstall_desc }}</p>
                        <p class="text-sm text-gray-600 mt-2">
                            @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
                                ⭐
                            @endfor
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $foodstalls->links() }}
        </div>
    @else
        <p>No warungs found.</p>
    @endif
        </div>
    </div>
</main>



  

</body>
<x-footer></x-footer>

</html>