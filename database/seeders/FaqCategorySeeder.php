<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Lidmaatschap' => [
                ['question' => 'Hoe word ik lid?', 'answer' => 'Je kan je inschrijven via het contactformulier of langskomen op een training.'],
                ['question' => 'Wat kost een lidmaatschap?', 'answer' => 'De jaarlijkse bijdrage bedraagt 50 euro voor volwassenen en 30 euro voor jongeren.'],
            ],
            'Trainingen' => [
                ['question' => 'Wanneer zijn de trainingen?', 'answer' => 'Trainingen zijn elke dinsdag en donderdag van 19u tot 21u.'],
                ['question' => 'Moet ik op voorhand inschrijven voor een training?', 'answer' => 'Nee, je kan gewoon langskomen tijdens de trainingsuren.'],
            ],
        ];

        foreach ($data as $categoryName => $items) {
            $category = FaqCategory::create(['name' => $categoryName]);

            foreach ($items as $item) {
                $category->items()->create($item);
            }
        }
    }
}
