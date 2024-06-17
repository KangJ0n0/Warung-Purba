<!-- resources/views/dwarung.blade.php -->

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
@section('content')
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
      <div class="p-4">
        <h2 class="text-xl font-bold mb-2">{{ $foodstall->foodstall_name }}</h2>
        <p class="text-sm text-gray-600 mb-2">{{ $foodstall->foodstall_location }}</p>
        <p class="text-sm text-gray-600 mb-4">{{ $foodstall->foodstall_contact }}</p>
        <p class="text-base text-gray-700 mb-4">{{ $foodstall->foodstall_desc }}</p>
        <p class="text-sm text-gray-600">
          Rating:
          @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
            ⭐
          @endfor
        </p>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    // Get the clicked id from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    // Make an API request to get the food stall data based on the id
    fetch(`/api/foodstalls/${id}`)
      .then(response => response.json())
      .then(data => {
        // Update the food stall details on the page
        document.querySelector('.max-w-7xl h2').textContent = data.foodstall_name;
        document.querySelector('.max-w-7xl .text-gray-600:nth-of-type(1)').textContent = data.foodstall_location;
        document.querySelector('.max-w-7xl .text-gray-600:nth-of-type(2)').textContent = data.foodstall_contact;
        document.querySelector('.max-w-7xl .text-gray-700').textContent = data.foodstall_desc;

        // Update the rating stars
        const ratingContainer = document.querySelector('.max-w-7xl .text-gray-600:last-of-type');
        ratingContainer.innerHTML = '';
        for (let i = 0; i < data.foodstall_rating; i++) {
          const star = document.createElement('span');
          star.textContent = '⭐';
          ratingContainer.appendChild(star);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  </script>
@endsection

</body>
</html>