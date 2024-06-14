<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warung Oren</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <!-- Navbar -->
<x-navbar>
</x-navbar>
  <div class="container mx-auto p-5">
    <!-- Image Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="col-span-2">
        <div class="bg-gray-300 h-64 flex items-center justify-center">Image</div>
      </div>
      <div class="bg-gray-300 h-32 flex items-center justify-center">Image</div>
      <div class="bg-gray-300 h-32 flex items-center justify-center">Image</div>
    </div>
    <!-- Info Section -->
    <div class="mt-5">
      <h1 class="text-3xl font-bold">{{$warung->foodstall_name}}</h1>
      <p class="text-gray-700">{{$warung->foodstall_location}}</p>
      <p class="text-gray-600">{{$warung->foodstall_desc}}</p>
    </div>
    
    <!-- Food Menu Section -->
    <div class="mt-5">
      <h2 class="text-2xl font-bold">Semua Makanan di Warung Oren</h2>
      <div class="flex justify-end mb-3">
        <button class="bg-white border border-gray-300 p-2 rounded">Filter</button>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
        <div class="bg-white shadow p-4">
          <div class="bg-gray-300 h-32 mb-4 flex items-center justify-center">Image</div>
          <p class="font-bold">Nama Makanan</p>
          <p class="text-gray-600">Harga Rp 5000</p>
        </div>
      </div>
    </div>
    <!-- Review Section -->
    <div class="mt-5">
      <h2 class="text-2xl font-bold">Review</h2>
      <div class="flex justify-end mb-3">
        <a href="#" class="text-gray-600">Lihat semua komentar</a>
      </div>
      @foreach ($reviews as $review)
      <div class="bg-white shadow p-4 mb-4 flex items-start">
        <div class="bg-gray-300 h-12 w-12 rounded-full flex items-center justify-center mr-4">O</div>
        <div>
          <p class="font-bold">{{$review->account->account_name}}</p>
          <p class="text-gray-600">{{$review->comment}}</p>
        </div>
      </div>
      @endforeach
      <form action="{{route('review.store')}}" method="post">
        @csrf
        <textarea name="comment" class="w-full p-3 border rounded" placeholder="Masukkan reviewmu..."></textarea>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-3">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>
