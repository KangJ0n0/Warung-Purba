@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Edit Review</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden p-6">
                <form method="POST" action="{{ route('reviews.update', $review->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 ⭐</option>
                            <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 ⭐</option>
                            <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 ⭐</option>
                            <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 ⭐</option>
                            <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 ⭐</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $review->comment }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="picture" class="block text-sm font-medium text-gray-700">Picture</label>
                        <input id="picture" name="picture" type="file" class="mt-1 block w-full" onchange="previewPicture(event)">
                        <div class="mt-2">
                            @if ($review->picture)
                                <img id="current-picture" src="{{ asset('storage/' . $review->picture) }}" alt="Review Picture" class="w-32 h-32">
                               
                            @else
                                <img id="current-picture" src="#" alt="Review Picture" class="w-32 h-32" style="display: none;">
                                <p id="current-picture-text" class="text-sm text-gray-600" style="display: none;">Current Picture</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Review</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
    function previewPicture(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('current-picture');
            output.src = reader.result;
            output.style.display = 'block';
            var text = document.getElementById('current-picture-text');
            text.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
