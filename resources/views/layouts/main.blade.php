<!-- resources/views/components/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix&Go</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-cover bg-center bg-no-repeat antialiased dark:bg-gradient-to-b dark:from-neutral-950 dark:to-neutral-900"
    style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed;">

<!-- Header -->
<header class="navbar bg-gray-200 shadow-sm transition-all fixed top-0 left-0 w-full z-50" id="navbar">
    <div class="flex-1 flex items-center ml-55 mt-1 mb-1">
        <a href="/">
            <img src="/images/logo.png" alt="Fix&Go Logo" class="w-40 mr-2">
        </a>
    </div>
    
    <div class="flex-none flex gap-2 mr-55">
        @if (Route::has('login'))
            @auth
            <a href="{{ route('profile') }}" class="btn bg-[#187aa0] hover:bg-[#125d7a] text-white">Profil</a>
            @else
                <a href="{{ route('login') }}" class="btn bg-[#187aa0] hover:bg-[#125d7a] text-white">Bejelentkezés</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn bg-[#125d7a] hover:bg-[#0e4860] text-white">Regisztráció</a>
                @endif
            @endauth
        @endif
    </div>
</header>

<script>
    window.onscroll = function() {
        const header = document.getElementById('navbar');
        if (window.scrollY > 50) {
            header.classList.add('shadow-xl', 'bg-opacity-90');
        } else {
            header.classList.remove('shadow-xl', 'bg-opacity-90');
        }
    };
</script>

<!-- Content wrapper -->
<div class="flex-grow p-4 mt-20">
    {{ $slot }} <!-- A dinamikus tartalom ide kerül -->
</div>
    
<!-- Footer -->
<footer class="footer sm:footer-horizontal bg-gray-200 text-black p-10">
    <aside class="ml-[150px]">
        <img src="images/logo.png" alt="Icon" width="100" />
        <br />
        Járműkarbantartó kereső szolgáltatás 2025 óta.
    </aside>
    <nav>
        <h6 class="footer-title">Szolgáltatások</h6>
        <a href="{{ route('alkatreszkereskedo') }}" class="link link-hover">Alkatrészkereskedők</a>
        <a href="{{ route('automentok') }}" class="link link-hover">Autómentők</a>
        <a href="{{ route('automoso') }}" class="link link-hover">Autómosók</a>
        <a href="{{ route('autoszerelo') }}" class="link link-hover">Autószerelők</a>
        <a href="{{ route('gumiszerviz') }}" class="link link-hover">Gumiszervízek</a>
    </nav>
    
    <nav>
        <h6 class="footer-title">Céginformációk</h6>
        <a href="{{ route('about-us') }}" class="link link-hover">Rólunk</a>
        <a href="{{ route('contact') }}" class="link link-hover">Kapcsolat</a>
    </nav>
    <nav>
        <h6 class="footer-title">Jogi információk</h6>
        <a href="{{ route('terms-of-service') }}" class="link link-hover">Felhasználási feltételek</a>
        <a href="{{ route('privacy-policy') }}" class="link link-hover">Adatvédelmi irányelvek</a>
        <a href="{{ route('cookie-policy') }}" class="link link-hover">Süti szabályzat</a>
    </nav>
    
</footer>
</body>
</html>
