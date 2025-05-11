<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Kezeli a bejövő hitelesítési kérést.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('homepage', absolute: false), navigate: true);
    }

    /**
     * Biztosítja, hogy a hitelesítési kérés ne legyen túl gyakori.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Visszaadja a hitelesítési kérés gyorsító kulcsát.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6 min-h-screen bg-white dark:bg-[url('/images/bg.dark.jpg')] bg-cover bg-center">

    <x-auth-header :title="__('Bejelentkezés a fiókodba')" :description="__('Add meg az email címed és a jelszavada bejelentkezéshez!')" />

    <!-- Munkamenet állapota -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email cím -->
        <flux:input
            wire:model="email"
            :label="__('Email cím')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@pelda.com"
        />

        <!-- Jelszó -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Jelszó')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Jelszó')"
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute right-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Elfelejtetted a jelszavad?') }}
                </flux:link>
            @endif
        </div>

        <!-- Emlékezz rám -->
        <flux:checkbox wire:model="remember" :label="__('Emlékezz rám')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Bejelentkezés') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Nincs még fiókod?') }}
            <flux:link :href="route('register')" wire:navigate>{{ __('Regisztrálj!') }}</flux:link>
        </div>
    @endif
</div>
