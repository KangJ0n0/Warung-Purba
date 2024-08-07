<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="h-10 w-10 self-center mr-2 rounded-full">
                        <img class="h-10 w-10 self-center rounded-full" src="https://cdn.sazumi.moe/file/is4kxw.png" />
                    </div>
                    <div>
                        <a href="/dashboard" class="text-2xl no-underline text-gray-800 hover:text-blue-600 font-bold">WARUNG PURBA</a><br>
                        <span class="text-xs text-gray-600">Cari info Warung disini</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="url('warung')" :active="request()->routeIs('warung')" wire:navigate>
                        {{ __('Warung') }}
                    </x-nav-link>
                    <x-nav-link :href="url('makanan')" :active="request()->routeIs('makanan')" wire:navigate>
                        {{ __('Makanan') }}
                    </x-nav-link>
                    <x-nav-link :href="url('catatan')" :active="request()->routeIs('catatan')">
                        {{ __('Catatan') }}
                    </x-nav-link>
                    <x-nav-link :href="url('info')" :active="request()->routeIs('info')" wire:navigate>
                        {{ __('Info') }}
                    </x-nav-link>
                 
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                @php
                // Determine the picture URL
                $userPictureUrl = auth()->user()->picture;
                if (!str_starts_with($userPictureUrl, 'http')) {
                    $userPictureUrl = asset('storage/' . $userPictureUrl);
                }
            @endphp
            <a href="{{ route('users.show', auth()->user()) }}" class="hover:scale-110">
                <img class="size-10 rounded-full object-cover" src="{{ $userPictureUrl }}" alt="Rounded avatar">
            </a>
            </a>
            

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('users.show', auth()->user())" wire:navigate>
                            {{ __('Halaman Profil') }}
                        </x-dropdown-link>
                    

                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Edit Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
                @else
                    <div class="ms-6">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Masuk</a>
                        <span class="text-gray-500 mx-2">|</span>
                        <a href="{{ route('register') }}" class="text-gray-500 hover:text-gray-700">Daftar</a>
                    </div>

                @endauth
            </div>
        

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="('warung')" :active="request()->routeIs('warung')" wire:navigate>
                {{ __('Warung') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="('makanan')" :active="request()->routeIs('makanan')" wire:navigate>
                {{ __('Makanan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="('catatan')" :active="request()->routeIs('catatan')" wire:navigate>
                {{ __('Catatan') }}
            </x-responsive-nav-link>
      
            <x-responsive-nav-link :href="('info')" :active="request()->routeIs('info')" wire:navigate>
                {{ __('info') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        
           
                @auth
                    <x-responsive-nav-link href="{{ route('users.show', auth()->user()) }}" class="text-gray-500 hover:text-gray-700">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    
                @endauth
       

            
                @auth
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Edit Profil') }}
                    </x-responsive-nav-link>
                    <button wire:click="logout" class="w-full text-start" onclick="location.reload()">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                @else
               
                    <x-responsive-nav-link href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Masuk</x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('register') }}" class="text-gray-500 hover:text-gray-700">Daftar</x-responsive-nav-link>
                    
                @endauth
            
        
    </div>
</nav>

