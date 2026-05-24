<?php

namespace Database\Factories;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => fake()->sentence(8) . '?',
            'answer' => fake()->paragraph(2),
            'faq_category_id' => FaqCategory::factory(),
        ];
    }
}