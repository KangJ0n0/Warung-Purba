<x-app-layout>
    
    <!-- Hero Section -->
    <section class="bg-blue-100 py-16">
        
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
            <h1 class="text-4xl md:text-5xl font-bold lobster-font">Temukan Makanan Enak Di Purbalingga</h1>
            <p class="mt-4 text-gray-700">Purbalingga menyimpan banyak kuliner lezat yang siap memanjakan lidahmu. Dari makanan tradisional hingga hidangan modern, semuanya tercatat di sini. Yuk, jelajahi dan catat berbagai kelezatan dari Warung Warung yang ada di Purbalingga!.</p>
            <br>
            <button class="middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true" onclick="document.getElementById('recommended-warung').scrollIntoView({ behavior: 'smooth' });">
                Mulai
            </button>
            
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 hover:-translate-y-1 cursor-pointer transition-transform duration-300 transform hover:scale-105">
                <img src="{{ asset('images/hero.png') }}" alt="Gambar panganan" class="rotate-image">
            </div>
            
        </div>
        </div>
    </section>

    <!-- Recommended Warung Section -->
    <section id="recommended-warung" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold lobster-font">Rekomendasi Warung</h2>
            <p class="mt-2 text-gray-600">Berbagai saran Warung di Purbalingga Dari Kami</p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($rekomendasiWarung as $foodstall)
                <a href="{{ route('foodstalls.show', ['foodstall' => $foodstall->id]) }}"> 
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:-translate-y-1 cursor-pointer transition-transform duration-300 transform hover:scale-105">
                    <img src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                    <div class="p-4 bg-blue-100">
                        <h3 class="text-lg font-semibold">{{ $foodstall->foodstall_name }}</h3>
                        <p class="mt-2 text-gray-600"> {{ $foodstall->foodstall_location }}</p>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recommended Food Section -->
    <section class="bg-blue-100 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold lobster-font">Rekomendasi Makanan Dari Kami</h2>
            <p class="mt-2 text-gray-600">Rekomendasi Makanan</p>
            {{-- <div class="mt-4 space-x-4">
                MASIH DIPERTIMBANGKAN
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Jepang</button>
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Barat</button>
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Lokal</button>
            </div> --}} 
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($rekomendasiMakanan as $food)
                <div x-data="{ open: false }" class="relative bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 transform hover:scale-105">
                    <a href="{{ route('foods.show', $food->id) }}" @mouseenter="open = true" @mouseleave="open = false">
                        <img src="{{ asset('storage/' . $food->food_pict) }}" alt="{{ $food->food_name }}" class="w-full h-64 object-cover">
                        <div x-show="open" x-transition class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white p-4">
                            <div class="text-center">
                                <h3 class="text-xl font-semibold">{{ $food->food_name }}</h3>
                               
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold lobster-font">Perlu Bantuan? Hubungi Kami</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex items-center justify-center space-x-4 bg-blue-100 p-4 rounded-lg">
                    <i class="fas fa-map-marker-alt text-2xl text-blue-500"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Alamat</h3>
                        <p class="text-gray-600">Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4 bg-blue-100 p-4 rounded-lg">
                    <i class="fas fa-envelope text-2xl text-blue-500"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Email</h3>
                        <p class="text-gray-600">warungpurba@gmail.com</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4 bg-blue-100 p-4 rounded-lg">
                    <i class="fas fa-phone text-2xl text-blue-500"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Telepon</h3>
                        <p class="text-gray-600">(0281) 6440198</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4 bg-blue-100 p-4 rounded-lg">
                    <i class="fas fa-whatsapp text-2xl text-blue-500"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Whatsapp</h3>
                        <p class="text-gray-600">+6282135204900</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <x-footer></x-footer>
</x-app-layout>
