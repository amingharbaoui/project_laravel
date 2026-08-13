<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Training', 'Wedstrijd', 'Evenement', 'Aankondiging'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
