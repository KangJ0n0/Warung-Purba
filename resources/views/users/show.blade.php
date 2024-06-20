<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">{{ $user->name }}'s Profile</h2>
    </x-slot>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <div class="p-6">
                    @php
                        // Determine the picture URL
                        $pictureUrl = $user->picture;
                        if (!str_starts_with($pictureUrl, 'http')) {
                            $pictureUrl = asset('storage/' . $user->picture);
                        }
                    @endphp

                    <img class="w-24 h-24 rounded-full object-cover mb-4" src="{{ $pictureUrl }}" alt="{{ $user->name }}">
                    
                    <h3 class="text-3xl font-bold mb-2">{{ $user->name }}</h3>
                    <p class="text-lg text-gray-700 mb-4">{{ $user->email }}</p>
                    <!-- Add more user details as needed -->
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
