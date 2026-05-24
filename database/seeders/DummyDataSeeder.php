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
        User::create([
            'name' => 'Johan Cruijff',
            'email' => 'cruijff@fcbarcelona.com',
            'password' => bcrypt('Password!321'),
            'username' => 'cruijff14',
            'bio' => 'Legende van FC Barcelona en het totaalvoetbal.',
            'birthday' => '1947-04-25',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Lamine Yamal',
            'email' => 'yamal@fcbarcelona.com',
            'password' => bcrypt('Password!321'),
            'username' => 'lamineyamal19',
            'bio' => 'Jong talent van FC Barcelona en Spanje.',
            'birthday' => '2007-07-13',
            'is_admin' => false,
        ]);

        NewsItem::factory(5)->create();

       
        FaqCategory::factory(3)->create()->each(function ($category) {
            FaqItem::factory(3)->create([
                'faq_category_id' => $category->id,
            ]);
        });

      
        ContactMessage::factory(5)->create();
    }
}