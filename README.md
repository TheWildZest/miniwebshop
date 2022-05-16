# Setup
- .env.example-ben be van állítva az adatbáziskapcsolat, a fájl másolható (adatbázis jelszót, felhasználónevet meg kell adni!)
- composer install
- php artisan key:generate
- 'store' nevű adatbázist létre kell hozni
- az adatbázishoz hozzá kell adni az alábbi extension-öket:
    - CREATE EXTENSION unaccent;
    - CREATE EXTENSION pg_trgm;
    Ezekre a kereső miatt van szükség: nem pontos kulcsszóra is hozni fog a kulcsszóhoz hasonló találtaokat, illetve kis- és nagybetű- valamint ékezet- érzéketlen
- npm install
- npm run dev
- php artisan migrate:fresh --seed

# Notes
- A rendelések néhány adattagja (email, név stb..) redundánsan vannak tárolva. Ennek oka a visszakövethetőség: ha egy user-t törlünk akkor is meglegyen minden adat egy a törölt felhasználó által leadott rendeléshez. (Törlés esetén az user_id null lesz, de a többi adat látszik)

# To upgrade
- A kosár jelenleg tárolja a termékek adatait. Ez a funkcionalitást nem befojásolja, de jobb megoldás lett volna ha csak az ID-t tároljuk és az adatokat mindig lekérjük adatbázisból (Ez pusztán megjelenítésnél van használva, a rendelésnél az adatokat mindenkor kivétel nélkül adatbázisból hozza a rendszer)
