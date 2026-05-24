<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Extra gebruikers
        $user1 = User::create([
            'name' => 'Johan Cruijff',
            'email' => 'cruijff@fcbarcelona.com',
            'password' => bcrypt('Password!321'),
            'username' => 'cruijff14',
            'bio' => 'Legende van FC Barcelona en het totaalvoetbal.',
            'birthday' => '1947-04-25',
            'is_admin' => false,
        ]);

        $user2 = User::create([
            'name' => 'Lamine Yamal',
            'email' => 'yamal@fcbarcelona.com',
            'password' => bcrypt('Password!321'),
            'username' => 'lamineyamal19',
            'bio' => 'Jong talent van FC Barcelona en Spanje.',
            'birthday' => '2007-07-13',
            'is_admin' => false,
        ]);

        // Admin user
        $admin = User::where('email', 'admin@ehb.be')->first();

        // Nieuwsberichten
        NewsItem::create([
            'title' => 'FC Barcelona wint El Clásico met 3-1!',
            'body' => 'In een spectaculaire wedstrijd versloeg FC Barcelona Real Madrid met 3-1. Doelpunten van Lewandowski (2x) en Raphinha bezorgden de Blaugrana een verdiende overwinning. Het was een dominante prestatie van het team van trainer Hansi Flick.',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(2),
        ]);

        NewsItem::create([
            'title' => 'Lamine Yamal verlengt contract tot 2030',
            'body' => 'FC Barcelona heeft het contract van wonderkind Lamine Yamal verlengd tot 2030. De 17-jarige Spanjaard is één van de grootste talenten ter wereld en speelt al enkele seizoenen in het eerste elftal.',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(5),
        ]);

        NewsItem::create([
            'title' => 'Pedri wint Ballon d\'Or',
            'body' => 'FC Barcelona middenvelder Pedri heeft de prestigieuze Ballon d\'Or gewonnen. De Spanjaard was dit seizoen ongenaakbaar en overtuigde de jury met zijn uitzonderlijke prestaties voor club en land.',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(10),
        ]);

        NewsItem::create([
            'title' => 'Camp Nou renovatie bijna klaar',
            'body' => 'De renovatie van het iconische Camp Nou stadion nadert zijn voltooiing. Het vernieuwde stadion zal een capaciteit hebben van 105.000 toeschouwers en beschikt over de modernste faciliteiten.',
            'user_id' => $admin->id,
            'published_at' => now()->subDays(15),
        ]);

        // FAQ categorieën, vragen
        $cat1 = FaqCategory::create(['name' => 'Tickets & Stadion']);
        FaqItem::create([
            'question' => 'Hoe kan ik tickets kopen voor een wedstrijd?',
            'answer' => 'Tickets kunnen worden gekocht via de officiële website van FC Barcelona of aan de kassa van Camp Nou. Leden krijgen voorrang bij de aankoop.',
            'faq_category_id' => $cat1->id,
        ]);
        FaqItem::create([
            'question' => 'Waar is Camp Nou gelegen?',
            'answer' => 'Camp Nou is gelegen in de wijk Les Corts in Barcelona, Spanje. Het adres is Carrer d\'Aristides Maillol, 08028 Barcelona.',
            'faq_category_id' => $cat1->id,
        ]);
        FaqItem::create([
            'question' => 'Zijn er rondleidingen in het stadion?',
            'answer' => 'Ja! Camp Nou biedt dagelijks rondleidingen aan waar je het veld, de kleedkamers en het museum kan bezoeken.',
            'faq_category_id' => $cat1->id,
        ]);

        $cat2 = FaqCategory::create(['name' => 'Club & Geschiedenis']);
        FaqItem::create([
            'question' => 'Wanneer werd FC Barcelona opgericht?',
            'answer' => 'FC Barcelona werd opgericht op 29 november 1899 door Joan Gamper en een groep vrienden.',
            'faq_category_id' => $cat2->id,
        ]);
        FaqItem::create([
            'question' => 'Wat betekent "Més que un club"?',
            'answer' => '"Més que un club" is Catalaans voor "Meer dan een club". Het is de slogan van FC Barcelona en verwijst naar de culturele en politieke betekenis van de club voor Catalonië.',
            'faq_category_id' => $cat2->id,
        ]);

        $cat3 = FaqCategory::create(['name' => 'Fansite']);
        FaqItem::create([
            'question' => 'Hoe maak ik een account aan?',
            'answer' => 'Klik rechtsboven op "Registreer" en vul je naam, e-mailadres en wachtwoord in. Je account is direct actief.',
            'faq_category_id' => $cat3->id,
        ]);
        FaqItem::create([
            'question' => 'Kan ik mijn profielfoto uploaden?',
            'answer' => 'Ja! Ga naar je profiel via het menu rechtsboven en klik op "Profiel bewerken". Daar kan je een profielfoto uploaden.',
            'faq_category_id' => $cat3->id,
        ]);

        // Contactberichten
        ContactMessage::create([
            'name' => 'Jan Janssen',
            'email' => 'jan@example.com',
            'message' => 'Hallo, ik wou vragen wanneer de volgende thuiswedstrijd is. Alvast bedankt!',
            'is_read' => false,
        ]);

        ContactMessage::create([
            'name' => 'Sophie Declercq',
            'email' => 'sophie@example.com',
            'message' => 'Geweldige fansite! Ik ben een grote Barça fan en volg jullie nieuws dagelijks.',
            'is_read' => true,
        ]);

        ContactMessage::create([
            'name' => 'Mohamed El Amrani',
            'email' => 'mohamed@example.com',
            'message' => 'Kunnen jullie meer informatie geven over het lidmaatschap van FC Barcelona?',
            'is_read' => false,
        ]);
    }
}