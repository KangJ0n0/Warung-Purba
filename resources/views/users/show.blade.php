<x-app-layout>


    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>

    <body>
        <main class="profile-page">
            <section class="relative block h-500-px">
                <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
                    background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
                ">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </section>
            <section class="relative py-1 bg-blueGray-200">
                <div class="container mx-auto px-1">
                    <div class="px-6 mb-5">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                    <div class="relative">
                                        @php
                                            // Determine the picture URL
                                            $pictureUrl = $user->picture;
                                            if (!str_starts_with($pictureUrl, 'http')) {
                                                $pictureUrl = asset('storage/' . $user->picture);
                                            }
                                        @endphp
                                        <img class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" src="{{ $pictureUrl }}" alt="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"></div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                        <div class="mr-4 p-3 text-center">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $user->reviews->count() }}</span>
                                            <span class="text-sm text-blueGray-400">Review</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center invisible">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">20</span>
                                            <span class="text-sm text-blueGray-400">Followers</span>
                                        </div>
                                        <div class="mr-4 p-3 text-center invisible">
                                            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">30</span>
                                            <span class="text-sm text-blueGray-400">Following</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-12">
                                <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                                    {{ $user->name }}
                                </h3>
                                <p class="text-lg text-gray-700 mb-4">{{ $user->email }}</p>
                                <!-- Add more user details as needed -->
                            </div>
                            <div class="flex flex-wrap justify-center">
                                <!-- User reviews section -->
                                <div class="w-full lg:w-8/12 px-4 py-10">
                                    <h4 class="text-2xl font-semibold leading-normal text-blueGray-700 mb-2">Histori Review</h4>
                                    @if($reviews->count() > 0)
                                        @foreach($reviews as $review)
                                            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                                                <div class="p-6">
                                                    <h5 class="text-xl font-semibold">{{ $review->foodStall->foodstall_name }}</h5>
                                                    <p class="text-lg text-gray-700 mb-4">{{ $review->comment }}</p>
                                                    <div class="flex items-center">
                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                            <svg class="w-5 h-5 text-yellow-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path d="M10 1l2.928 6.472 6.472.928-4.714 4.586 1.114 6.472L10 15.198l-5.8 3.26 1.114-6.472L.6 8.4l6.472-.928L10 1z"/>
                                                            </svg>
                                                        @endfor
                                                        <span class=" ext-sm text-gray-500 ml-1 text-xs uppercase">{{ $review->rating }}</span>
                                                    </div>
                                                    <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                                           
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Pagination links -->
                                        <div class="mt-4">
                                            {{ $reviews->links('pagination::simple-tailwind') }}
                                        </div>
                                    @else
                                        <p class="text-lg text-gray-700 mb-4">No reviews found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                                <!-- Footer content -->
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        </main>
    </body>
    <x-footer></x-footer>
    </html>
</x-app-layout>
