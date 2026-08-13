<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $tags = Tag::all();

        $items = [
            [
                'title' => 'Start van het nieuwe seizoen',
                'content' => 'We zijn verheugd om het nieuwe seizoen af te trappen met een vernieuwd trainingsschema.',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Overwinning tijdens de eerste wedstrijd',
                'content' => 'Onze eerste ploeg won met een mooie score. Proficiat aan alle spelers!',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Jaarlijks eetfestijn aangekondigd',
                'content' => 'Noteer alvast de datum in je agenda voor ons jaarlijks eetfestijn ten voordele van de club.',
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($items as $item) {
            $news = News::create([
                'user_id' => $admin->id,
                'title' => $item['title'],
                'content' => $item['content'],
                'published_at' => $item['published_at'],
            ]);

            $news->tags()->attach($tags->random(rand(1, 2))->pluck('id'));
        }
    }
}
