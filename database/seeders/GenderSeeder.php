<?php

namespace Database\Seeders;

use App\Models\Dictionaries\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawCities = [
            'Мужчина', 'Женщина',
        ];

        foreach ($rawCities as $title) {
            Gender::factory()->create([
                'title' => $title
            ]);
        }
    }
}
