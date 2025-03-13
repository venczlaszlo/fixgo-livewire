<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-cover bg-center bg-no-repeat antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900" style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed;">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 w-auto mb-1">
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
