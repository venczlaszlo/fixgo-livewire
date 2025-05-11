<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix&Go</title>
    @vite('resources/css/app.css')
</head>
<body id="main-body"
      data-bg-light="{{ asset('images/bg.jpg') }}"
      data-bg-dark="{{ asset('images/bgdark.jpg') }}"
      class="min-h-screen flex flex-col bg-cover bg-center bg-no-repeat antialiased transition-all duration-300 text-black dark:text-white"
      style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed;">

<!-- Header -->
<header id="navbar" class="navbar bg-gray-200 dark:bg-gray-900 text-black dark:text-white shadow-sm transition-all fixed top-0 left-0 w-full z-50">
    <div class="w-full">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center flex-nowrap py-2 gap-2">
            <a href="/" class="flex-shrink-0">
                <img src="/images/logo.png" alt="Fix&Go Logo" class="w-32 sm:w-40 dark:hidden">
                <img src="/images/logo_dark.png" alt="Fix&Go Logo" class="w-32 sm:w-40 hidden dark:block">
            </a>

            <div class="flex gap-1 items-center flex-nowrap text-xs sm:text-base">
                <!-- Dark mode toggle -->
                <label class="cursor-pointer">
                    <input type="checkbox" id="themeToggle" class="toggle scale-75 sm:scale-100" />
                </label>

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

    if (localStorage.getItem('theme') === 'dark') {
        htmlTag.classList.add('dark');
        toggle.checked = true;
        setBackground(darkBg);
    }

    toggle.addEventListener('change', () => {
        if (toggle.checked) {
            htmlTag.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            setBackground(darkBg);
        } else {
            htmlTag.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            setBackground(lightBg);
        }
    });
</script>

<!-- Content wrapper -->
<div class="max-w-7xl mx-auto px-4 mt-28">
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
