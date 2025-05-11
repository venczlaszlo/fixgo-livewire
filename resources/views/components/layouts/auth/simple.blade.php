<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <style>
        .theme-toggle {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            color: inherit;
            padding: 0.5rem;
            z-index: 50;
        }

        .sun-and-moon {
            transition: transform 0.5s ease;
        }

        .dark .sun-and-moon {
            transform: rotate(180deg);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const logo = document.getElementById('logo-img');

            // Inicializálás
            function applyTheme(isDark) {
                html.classList.toggle('dark', isDark);
                document.body.style.backgroundImage = isDark
                    ? "url('{{ asset('images/bgdark.jpg') }}')"
                    : "url('{{ asset('images/bg.jpg') }}')";
                document.body.style.color = isDark ? 'white' : 'black';
                if (logo) {
                    logo.src = isDark
                        ? "{{ asset('images/logo_dark.png') }}"
                        : "{{ asset('images/logo.png') }}";
                }
                localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
            }

            const savedMode = localStorage.getItem('darkMode');
            const isDark = savedMode === 'enabled' || (!savedMode && window.matchMedia('(prefers-color-scheme: dark)').matches);
            applyTheme(isDark);

            // Gomb esemény
            themeToggle.addEventListener('click', () => {
                applyTheme(!html.classList.contains('dark'));
            });
        });
    </script>
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat antialiased" style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed;">
<!-- Theme Toggle Gomb -->
<button class="theme-toggle" id="theme-toggle" title="Toggles light & dark" aria-label="auto" aria-live="polite">
    <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
        <mask class="moon" id="moon-mask">
            <rect x="0" y="0" width="100%" height="100%" fill="white" />
            <circle cx="24" cy="10" r="6" fill="black" />
        </mask>
        <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor" />
        <g class="sun-beams" stroke="currentColor">
            <line x1="12" y1="1" x2="12" y2="3" />
            <line x1="12" y1="21" x2="12" y2="23" />
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
            <line x1="1" y1="12" x2="3" y2="12" />
            <line x1="21" y1="12" x2="23" y2="12" />
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
        </g>
    </svg>
</button>

<div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
    <div class="flex w-full max-w-sm flex-col gap-2">
        <a href="{{ route('homepage') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
            <img id="logo-img" src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 w-auto mb-1">
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
