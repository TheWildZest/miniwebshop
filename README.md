- .env.example-ben be van állítva az adatbáziskapcsolat, a fájl másolható (adatbázis jelszót, felhasználónevet meg kell adni!)
- composer install
- php artisan key:generate
- 'miniwebhsop' nevű adatbázist létre kell hozni
- az adatbázishoz hozzá kell adni az alábbi extension-öket:
    - CREATE EXTENSION unaccent;
    - CREATE EXTENSION pg_trgm;
    Ezekre a kereső miatt van szükség: nem pontos kulcsszóra is hozni fog a kulcsszóhoz hasonló találtaokat, illetve kis- és nagybetű- valamint ékezet- érzéketlen
- npm install
- npm run dev
- php artisan migrate:fresh --seed
