# Fix&Go

Élő demó: [https://fixgo.mittudomen.hu](https://fixgo.mittudomen.hu)

 A **Fix&Go** egy járműszerviz-kereső platform, amelynek célja, hogy egyszerűbbé tegye a megbízható autós szolgáltatások megtalálását Magyarországon, különösen Gyula és környékén.



## Projekt célja

A cél egy könnyen használható, reszponzív webalkalmazás fejlesztése, amely valós szolgáltatókat jelenít meg, és lehetővé teszi a felhasználóknak a kedvencek kezelését, szolgáltatások értékelését.

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

## Telepítés (fejlesztői környezet)

```bash
git clone https://github.com/venczlaszlo/fixgo-livewire.git / https://git.gszi.edu.hu/vizsgaremek2425/vremek_13B_01.git
cd fixgo-livewire / vremek_13B_01
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan migrate --seed
npm install && npm run dev
php artisan serve

