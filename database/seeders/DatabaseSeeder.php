<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {




        //BelongsTo RELATIONSHIP
        // Post::factory()
        //     ->count(2)
        //     ->for(User::factory()->create(), 'author')
        //     ->create();



        //HAS MANY RELATIONSHIP
        User::factory(2)
            ->has(Post::factory()->count(1))
            ->create();

        // User::factory(2)->create()->each(function ($user) {
        //     Post::factory(2)->for($user, 'author')->create();
        // });



        //User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Maruf Rahman',
        //     'email' => 'marufrahman08@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);
    }
}
