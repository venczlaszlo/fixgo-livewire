<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Kezeli a regisztrációs kérelmet.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('homepage', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Fiók létrehozása')" :description="__('Add meg az adataidat a regisztrációhoz!')" />

    <!-- Munkamenet állapota -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Név -->
        <flux:input
            wire:model="name"
            :label="__('Név')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Teljes név')"
        />

        <!-- Email cím -->
        <flux:input
            wire:model="email"
            :label="__('Email cím')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@pelda.com"
        />

        <!-- Jelszó -->
        <flux:input
            wire:model="password"
            :label="__('Jelszó')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Jelszó')"
        />

        <!-- Jelszó megerősítése -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Jelszó megerősítése')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Jelszó megerősítése')"
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Fiók létrehozása') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Már van fiókod?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Bejelentkezés') }}</flux:link>
    </div>
</div>
