<?php

namespace Database\Seeders;

use App\Models\Page\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title'     => 'Обычная страница',
                'slug'      => 'simple',
            ],
            [
                'title'     => 'Политика конфиденциальности',
                'slug'      => 'privacy-policy',
            ],
            [
                'title'     => 'Правила сайта',
                'slug'      => 'rules',
            ],
            [
                'title'     => 'Разместить рекламу на сайте',
                'slug'      => 'ads-place-on-site',
            ],
            [
                'title'     => 'Промо размещение',
                'slug'      => 'ads-promo-placement',
            ],
        ];

        foreach ($pages as $page) {
            Page::factory()->create($page);
        }
    }
}
