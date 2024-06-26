<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public $picture;
    public $newPicture;
    public $newPicturePreview = null;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->picture = Auth::user()->picture;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'newPicture' => ['nullable', 'image', 'max:1024'], // Add validation for the new picture
        ]);

        if ($this->newPicture) {
            $validated['picture'] = $this->newPicture->store('profile-pictures', 'public');
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);

$this->redirect(url('profile'));
    }

    /**
     * Live preview for the new picture.
     */
    public function updatedNewPicture(): void
    {
        $this->newPicturePreview = $this->newPicture->temporaryUrl();
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Render the component.
     *
     * @return mixed
     */
    public function render(): mixed
    {
        return view('livewire.profile.update-profile-information-form', [
            'newPicturePreview' => $this->newPicturePreview,
        ]);
    }
};
?>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ubah nama akun dan password akun mu") }}
        </p>
    </header>

    <form wire:submit.prevent="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="picture" :value="__('Gambar profil')" />
            @php
                // Determine the picture URL
                $userPictureUrl = Auth::user()->picture;
                if (!str_starts_with($userPictureUrl, 'http')) {
                    $userPictureUrl = asset('storage/' . $userPictureUrl);
                }
            @endphp
            <div class="mt-2">
                @if ($newPicturePreview)
                    <img class="block w-24 h-24 rounded-full" src="{{ $newPicturePreview }}" alt="New Picture Preview">
                @else
                    <img class="block w-24 h-24 rounded-full" src="{{ $userPictureUrl }}" alt="User Picture">
                @endif
            </div>
            <input type="file" wire:model="newPicture" class="mt-2 block w-full text-sm text-gray-600" />
            <x-input-error class="mt-2" :messages="$errors->get('newPicture')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Berhasil disimpan.') }}
            </x-action-message>
        </div>
    </form>
</section>
