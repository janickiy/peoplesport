<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
           SettingSeeder::class,
           MenuSeeder::class,
           CitySeeder::class,
           GenderSeeder::class,
           JobSeeder::class,
           AwardSeeder::class,
           UserSeeder::class,
           NewsSeeder::class,
           PageSeeder::class,
           FaqSeeder::class,
           FaqSeeder::class,
           ForumSeeder::class,
           EventSeeder::class
       ]);
    }
}
