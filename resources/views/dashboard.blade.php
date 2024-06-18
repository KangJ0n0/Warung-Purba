<x-app-layout>


    
    <!-- Hero Section -->
    <section class="bg-blue-100 py-16">
        
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold lobster-font">Temukan Makanan Enak Di Purbalingga</h1>
                <p class="mt-4 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Harum rerum reprehenderit, neque alias fugiat saepe ratione blanditiis quidem iusto dolore ab.</p>
                <button class="mt-6 bg-blue-500 text-white px-6 py-3 rounded-full">Mulai</button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 hover:-translate-y-1 cursor-pointer transition-transform duration-300 transform hover:scale-105">
                <img src="{{ asset('images/hero.png') }}" alt="Delicious food with rice and vegetables on a plate">
            </div>
        </div>
    </section>

    <!-- Recommended Warung Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold lobster-font">Warung Rekomendasi</h2>
            <p class="mt-2 text-gray-600">Rekomendasi Warung Purbalingga Dari Kami</p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($rekomendasi as $foodstall)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                    <div class="p-4 bg-blue-100">
                        <h3 class="text-lg font-semibold">{{ $foodstall->foodstall_name }}</h3>
                        <p class="text-gray-600">{{ $foodstall->foodstall_rating }}</p>
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
            <div class="mt-4 space-x-4">
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Jepang</button>
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Barat</button>
                <button class="bg-white text-blue-500 px-4 py-2 rounded-full">Lokal</button>
            </div>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://placehold.co/300x300" alt="Japanese food with rice and chopsticks">
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://placehold.co/300x300" alt="Western style hamburger">
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://placehold.co/300x300" alt="Local dish with rice and vegetables">
                </div>
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
                        <p class="text-gray-600">Jl. Kartini No.20 Purbalingga</p>
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
                        <p class="text-gray-600">(0281) 313786</p>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4 bg-blue-100 p-4 rounded-lg">
                    <i class="fas fa-whatsapp text-2xl text-blue-500"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Whatsapp</h3>
                        <p class="text-gray-600">+628561223344</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <x-footer></x-footer>
</x-app-layout>