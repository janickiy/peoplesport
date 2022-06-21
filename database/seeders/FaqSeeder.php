<?php

namespace Database\Seeders;

use App\Models\Page\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Как разместить свою тему форума?'],
            ['title' => 'Как разместить свою запись в ленте записей?'],
            ['title' => 'Как стать сделать свою запись «Промо»?'],
            ['title' => 'Как повысить свой рейтинг?'],
            ['title' => 'Зачем нужно повышать рейтинг?'],
            ['title' => 'Что дают мои бонусы?'],
            ['title' => 'Как заработать мои бонусы?'],
        ];

        foreach ($items as $item) {
            Faq::factory()->create($item);
        }
    }
}
