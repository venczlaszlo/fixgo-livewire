<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix&Go</title>
    @vite('resources/css/app.css')
    <style>
        .theme-toggle {
            background: transparent;
            border: none;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: currentColor;
            transition: color 0.3s ease;
        }
        .theme-toggle svg {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>
</head>
<body id="main-body"
      data-bg-light="{{ asset('images/bg.jpg') }}"
      data-bg-dark="{{ asset('images/bgdark.jpg') }}"
      class="min-h-screen flex flex-col bg-cover bg-center bg-no-repeat antialiased transition-all duration-300 text-black dark:text-white"
      style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; height: 100%;">

<!-- Header -->
<header id="navbar" class="navbar bg-gray-200 dark:bg-gray-900 text-black dark:text-white shadow-sm transition-all fixed top-0 left-0 w-full z-50">
    <div class="w-full">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center flex-nowrap py-2 gap-2">
            <a href="/" class="flex-shrink-0">
                <img src="/images/logo.png" alt="Fix&Go Logo" class="w-32 sm:w-40 dark:hidden">
                <img src="/images/logo_dark.png" alt="Fix&Go Logo" class="w-32 sm:w-40 hidden dark:block">
            </a>

            <div class="flex gap-2 items-center flex-nowrap text-xs sm:text-base">
                <!-- Dark mode toggle -->
                <button class="theme-toggle" id="themeToggle" title="Toggles light & dark" aria-label="auto" aria-live="polite">
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

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile') }}" class="btn bg-[#187aa0] hover:bg-[#125d7a] text-white dark:text-white px-1.5 py-0.5 sm:px-3 sm:py-1.5 text-xs sm:text-sm whitespace-nowrap">Profil</a>
                    @else
                        <a href="{{ route('login') }}" class="btn bg-[#187aa0] hover:bg-[#125d7a] text-white dark:text-white px-1.5 py-0.5 sm:px-3 sm:py-1.5 text-xs sm:text-sm whitespace-nowrap">Bejelentkezés</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn bg-[#125d7a] hover:bg-[#0e4860] text-white dark:text-white px-1.5 py-0.5 sm:px-3 sm:py-1.5 text-xs sm:text-sm whitespace-nowrap">Regisztráció</a>
                        @endif
                    @endauth
                @endif
            </div>

        </div>
    </div>
</header>

<script>
    window.onscroll = function () {
        const header = document.getElementById('navbar');
        if (window.scrollY > 50) {
            header.classList.add('shadow-xl', 'bg-opacity-90');
        } else {
            header.classList.remove('shadow-xl', 'bg-opacity-90');
        }
    };

    const toggle = document.getElementById('themeToggle');
    const htmlTag = document.documentElement;
    const body = document.getElementById('main-body');

    const lightBg = body.dataset.bgLight;
    const darkBg = body.dataset.bgDark;

    function setBackground(imageUrl) {
        body.style.backgroundImage = `url('${imageUrl}')`;
        body.style.backgroundSize = 'cover';
        body.style.backgroundPosition = 'center center';
        body.style.backgroundRepeat = 'no-repeat';
        body.style.backgroundAttachment = 'fixed';
    }

    function applyTheme(theme) {
        if (theme === 'dark') {
            htmlTag.classList.add('dark');
            setBackground(darkBg);
        } else {
            htmlTag.classList.remove('dark');
            setBackground(lightBg);
        }
        localStorage.setItem('theme', theme);
    }

    if (localStorage.getItem('theme') === 'dark') {
        applyTheme('dark');
    }

    toggle.addEventListener('click', () => {
        const isDark = htmlTag.classList.contains('dark');
        applyTheme(isDark ? 'light' : 'dark');
    });
</script>

<!-- Content wrapper -->
<div class="max-w-7xl mx-auto px-4 mt-28 flex-1">
    {{ $slot }}
</div>

<!-- Footer -->
<footer class="bg-gray-200 dark:bg-gray-900 text-black dark:text-white py-6 transition-all">
    <div class="w-full max-w-7xl mx-auto px-4 flex flex-wrap sm:flex-nowrap items-start justify-between gap-4">

        <!-- Logo + szöveg -->
        <div class="flex-shrink-0 max-w-[160px]">
            <img src="/images/logo.png" alt="Icon" class="w-20 dark:hidden mb-2" />
            <img src="/images/logo_dark.png" alt="Icon" class="w-20 hidden dark:block mb-2" />
            <p class="text-xs sm:text-sm">Járműkarbantartó kereső<br>2025 óta.</p>
        </div>

        <!-- Szolgáltatások -->
        <div class="flex flex-col gap-[2px] sm:gap-2 sm:text-sm flex-shrink-0 min-w-[120px]">
            <h6 class="font-semibold text-xs sm:text-sm mb-[2px]">Szolgáltatások</h6>
            <a href="{{ route('alkatreszkereskedo') }}" class="hover:underline">Alkatrészkereskedők</a>
            <a href="{{ route('autoszerelo') }}" class="hover:underline">Autószerelők</a>
            <a href="{{ route('gumiszerviz') }}" class="hover:underline">Gumiszerviz</a>
            <a href="{{ route('automoso') }}" class="hover:underline">Autómosók</a>
            <a href="{{ route('automentok') }}" class="hover:underline">Autómentők</a>
        </div>

        <!-- Céginfó -->
        <div class="flex flex-col gap-[2px] sm:gap-2 sm:text-sm flex-shrink-0 min-w-[120px]">
            <h6 class="font-semibold text-xs sm:text-sm mb-[2px]">Céginformációk</h6>
            <a href="{{ route('about-us') }}" class="hover:underline">Rólunk</a>
            <a href="{{ route('contact') }}" class="hover:underline">Kapcsolat</a>
        </div>

        <!-- Jogi -->
        <div class="flex flex-col gap-[2px] sm:gap-2 sm:text-sm flex-shrink-0 min-w-[120px]">
            <h6 class="font-semibold text-xs sm:text-sm mb-[2px]">Jogi információk</h6>
            <a href="{{ route('terms-of-service') }}" class="hover:underline">Felhasználási feltételek</a>
            <a href="{{ route('privacy-policy') }}" class="hover:underline">Adatvédelmi irányelvek</a>
            <a href="{{ route('cookie-policy') }}" class="hover:underline">Süti szabályzat</a>
        </div>
    </div>
</footer>

</body>
</html>
