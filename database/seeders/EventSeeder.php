<?php

namespace Database\Seeders;

use App\Models\Event\Event;
use App\Models\Event\EventCategory;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawCategories = [
            [
                'title' => 'Спорт',
                'slug'  => 'sport'
            ],
            [
                'title' => 'Фитнес',
                'slug'  => 'fitnes'
            ],
            [
                'title' => 'Красота и здоровье',
                'slug'  => 'krasota-i-zdoroye'
            ],
            [
                'title' => 'Другое',
                'slug'  => 'drugoe'
            ],
        ];

        foreach ($rawCategories as $category) {
            EventCategory::factory()->create($category);
        }

        Event::factory()
            ->count(35)
            ->create();
    }
}
