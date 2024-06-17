<!-- resources/views/foodstalls/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">{{ $foodstall->foodstall_name }}</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $foodstall->foodstall_pict) }}" alt="{{ $foodstall->foodstall_name }}">
                <div class="p-6">
                    <p class="text-sm text-gray-600 mb-2">{{ $foodstall->foodstall_location }}</p>
                    <p class="text-sm text-gray-600 mb-4">{{ $foodstall->foodstall_desc }}</p>
                    <p class="text-sm text-gray-600 mb-2">Contact: {{ $foodstall->foodstall_contact }}</p>
                    <p class="text-sm text-gray-600 mb-4">
                        @for ($i = 0; $i < $foodstall->foodstall_rating; $i++)
                            ⭐
                        @endfor
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
