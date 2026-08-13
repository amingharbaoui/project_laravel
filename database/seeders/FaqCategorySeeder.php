<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Membership' => [
                ['question' => 'How do I become a member?', 'answer' => 'You can sign up via the contact form or by stopping by during a training session.'],
                ['question' => 'How much does membership cost?', 'answer' => 'The annual fee is €50 for adults and €30 for youth members.'],
            ],
            'Trainings' => [
                ['question' => 'When are the training sessions?', 'answer' => 'Trainings are held every Tuesday and Thursday from 7pm to 9pm.'],
                ['question' => 'Do I need to sign up in advance for a training?', 'answer' => 'No, you can just show up during training hours.'],
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
