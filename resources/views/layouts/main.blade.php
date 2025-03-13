<!-- resources/views/components/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix&Go</title>
    @vite('resources/css/app.css')
</head>
<body>

<!-- Header -->
<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">Fix&Go</a> <!-- Itt az oldal neve, ezt cserélheted -->
    </div>
    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Content goes here -->
<div class="p-4">
    {{ $slot }} <!-- A dinamikus tartalom ide kerül, ha ezt a komponenst használod -->
</div>

<!-- Footer -->
<footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content p-4">
  <aside>
    <p>Copyright © {{ date('Y') }} - All right reserved by ACME Industries Ltd</p>
  </aside>
</footer>

</body>
</html>
