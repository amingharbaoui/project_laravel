<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            TagSeeder::class,
            FaqCategorySeeder::class,
            NewsSeeder::class,
        ]);

        User::factory(10)->create();
    }
}
