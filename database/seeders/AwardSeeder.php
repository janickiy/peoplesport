<?php

namespace Database\Seeders;

use App\Models\Award\Award;
use App\Models\Award\AwardCategory;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
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
                'title' => 'Бронзовые награды',
                'color' => '#cc7429',
            ],
            [
                'title' => 'Серебряные награды',
                'color' => '#b2b2b2',
            ],
            [
                'title' => 'Золотые награды',
                'color' => '#deba42',
            ],
            [
                'title' => 'Даймондовые награды',
                'color' => '#52e2ee',
            ],
        ];

        $rawAwards = [
            [
                'title'         => 'Собеседник',
                'description'   => 'За 10 сообщений на форуме',
                'image'         => null
            ],
            [
                'title'         => 'You Rock',
                'description'   => 'За пожертвование сайту от 500 руб',
                'image'         => null
            ],
            [
                'title'         => 'Начинающий видеоблогер',
                'description'   => 'За видео которе ты создал, или в котором принял участие',
                'image'         => null
            ],
            [
                'title'         => 'Маркетолог',
                'description'   => 'За хорошие слова о сайте (приведи друга, репосты и др)',
                'image'         => null
            ],
            [
                'title'         => 'Идейный',
                'description'   => 'Придумать акцию',
                'image'         => null
            ],
        ];

        foreach ($rawCategories as $category) {
            AwardCategory::factory()->create($category);
        }

        for ($category_id = 0; $category_id < count($rawCategories); $category_id++) {
            foreach ($rawAwards as $award) {
                Award::factory()->create([
                    'title'         => $award['title'],
                    'description'   => $award['description'],
                    'category_id'   => $category_id + 1
                ]);
            }
        }
    }
}
