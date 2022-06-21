<?php

namespace Database\Seeders;

use App\Models\Dictionaries\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawCities = [
            'Москва', 'Санкт-Петербург', 'Новосибирск',
            'Екатеринбург', 'Казань', 'Нижний Новгород',
            'Челябинск', 'Самара', 'Омск', 'Ростов-на-Дону',
            'Уфа'
        ];

        foreach ($rawCities as $title) {
            City::factory()->create([
                'title' => $title
            ]);
        }
    }
}
