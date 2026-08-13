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
                'title' => 'Start of the new season',
                'content' => 'We are excited to kick off the new season with a refreshed training schedule.',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Victory in the first match',
                'content' => 'Our first team won with a great score. Congratulations to all the players!',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Annual fundraising dinner announced',
                'content' => 'Save the date for our annual fundraising dinner in support of the club.',
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
