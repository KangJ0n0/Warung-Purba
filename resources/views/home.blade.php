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
  
<!-- Hero Section -->
<section class="bg-blue-100 py-16">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold lobster-font">Temukan Makanan Enak Di Purbalingga</h1>
                <p class="mt-4 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Harum rerum reprehenderit, neque alias fugiat saepe ratione blanditiis quidem iusto dolore ab.</p>
                <button class="mt-6 bg-blue-500 text-white px-6 py-3 rounded-full">Mulai</button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="../../../images/hero.png" alt="Delicious food with rice and vegetables on a plate">
            </div>
        </div>
    </section>

    <!-- Recommended Warung Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold lobster-font">Warung Rekomendasi</h2>
            <p class="mt-2 text-gray-600">Rekomendasi Warung Purbalingga Dari Kami</p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
              @foreach ($rekomendasi as $foodstall )
              <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <img src="https://placehold.co/300x200" alt="Interior of a cozy warung">
                  <div class="p-4 bg-blue-100">
                      <h3 class="text-lg font-semibold">{{$foodstall->foodstall_name}}</h3>
                      <p class="text-gray-600">{{$foodstall->foodstall_rating}}</p>
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
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($makanan as $food)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{$food->food_pict}}" alt="Japanese food with rice and chopsticks">
                    <div class="p-4 bg-blue-100">
                        <h3 class="text-lg font-semibold">{{$food->food_name}}</h3>
                        <p class="text-gray-600">{{$food->food_price}}</p>
                    </div>
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



</body>
<x-footer></x-footer>

</html>