# Fix&Go

**Fix&Go** egy online járműszerviz-kereső platform, amely segíti a felhasználókat abban, hogy gyorsan megtalálják a legközelebbi autószerelőket, autómosókat, gumisokat, alkatrészboltokat és autómentőket.

## Projekt célja

A cél egy könnyen használható, reszponzív webalkalmazás fejlesztése, amely valós szolgáltatókat jelenít meg, és lehetővé teszi a felhasználóknak a kedvencek kezelését, szolgáltatások értékelését, valamint saját profiljuk testreszabását.

## Készítők

- **Megyeri Gábor**
- **Vencz László**
- **Vitányi Krisztián**

**Békéscsabai SZC Nemes Tihamér Technikum és Kollégium – 2025 vizsgaremek**

## Funkciók

- Felhasználói regisztráció / bejelentkezés (JWT tokennel)
- Profilkezelés (adatmódosítás, jelszóváltás)
- Térképes szervizkeresés (Google Maps API)
- Szűrés: értékelés, nyitvatartás, ár, felszereltség
- Szolgáltatások értékelése, kedvencek kezelése
- Admin funkciók (Filament alapú CRUD)

## Technológiák

- **Frontend:** HTML, Tailwind CSS, JavaScript, Laravel Livewire
- **Backend:** PHP (Laravel), MySQL
- **Egyéb:** Google Maps API, JWT, Filament, DaisyUI

## Telepítés (fejlesztői környezet)

```bash
git clone https://github.com/venczlaszlo/fixgo-livewire.git
cd fixgo-livewire
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan migrate --seed
npm install && npm run dev
php artisan serve

