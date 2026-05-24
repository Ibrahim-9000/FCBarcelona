# FC Barcelona Fansite
Een dynamische fansite voor FC Barcelona gebouwd met Laravel 13.

## Projectbeschrijving
Een volledige Laravel webapplicatie voor FC Barcelona fans. De site bevat een publiek deel met nieuws, FAQ en contact, en een admin deel voor beheer van alle content en gebruikers.

## Functionaliteiten
- **Login systeem** — registreren, inloggen, uitloggen, wachtwoord resetten, remember me
- **Gebruikersbeheer** — admins kunnen gebruikers verheffen/afnemen en manueel aanmaken
- **Profielpagina** — publiek profiel met username, verjaardag, profielfoto en bio
- **Nieuws** — admins kunnen nieuwsitems aanmaken, bewerken en verwijderen. Iedereen kan nieuws lezen.
- **FAQ** — categorieën en vragen beheerd door admins, zichtbaar voor iedereen
- **Contactformulier** — bezoekers kunnen een bericht sturen, admin ontvangt email via Mailtrap
- **Admin dashboard** — contactberichten worden opgeslagen in de database en zijn leesbaar/onleesbaar te markeren

## Technische vereisten
| Vereiste | Implementatie |
|----------|--------------|
| Twee layouts | `welcome.blade.php` (startpagina) en `layouts/app.blade.php` (interne paginas) |
| Components | `x-app-layout`, `x-breeze.input-label`, `x-breeze.text-input` |
| XSS protection | `{{ }}` syntax in alle views |
| CSRF protection | `@csrf` in alle formulieren |
| Client-side validation | `required`, `minlength`, `type="email"`, `accept="image/*"` |
| Routes met controllers | Alle routes gebruiken controller methods |
| Middleware | `auth` en `is_admin` middleware op beschermde routes |
| Gegroepeerde routes | Routes gegroepeerd per middleware in `web.php` |
| Eloquent models | `User`, `NewsItem`, `FaqCategory`, `FaqItem`, `ContactMessage` |
| One-to-many relatie | `FaqCategory` heeft veel `FaqItem`s — `NewsItem` behoort tot `User` |
| Factories | `NewsItemFactory`, `FaqCategoryFactory`, `FaqItemFactory` met `fake()` data |
| Migraties en seeders | `php artisan migrate:fresh --seed` maakt alles aan |

## Installatie

1. Clone de repository
```bash
git clone https://github.com/Ibrahim-9000/FCBarcelona.git
cd FCBarcelona
```

2. Installeer dependencies
```bash
composer install
npm install
```

3. Maak `.env` bestand
```bash
cp .env.example .env
php artisan key:generate
```

4. Stel database in (SQLite)
```bash
DB_CONNECTION=sqlite
```

5. Migreer en seed de database
```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

6. Start de server
```bash
php -S 127.0.0.1:8000 -t public
```

## Standaard admin account
- **Email:** admin@ehb.be
- **Wachtwoord:** Password!321

## Gebruikte bronnen
- [Laravel documentatie](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Mailtrap](https://mailtrap.io)
- AI assistentie via Claude
