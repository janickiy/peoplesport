<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use App\Models\Menu\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name'  => 'Меню',
                'slug'  => 'footer-1',
                'items' => [
                    [
                        'name'  => 'О нас',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Лента записей',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Пользователи',
                        'value' => '/users'
                    ],
                    [
                        'name'  => 'Новости',
                        'value' => '/news'
                    ],
                    [
                        'name'  => 'Мероприятия',
                        'value' => '#'
                    ],
                ]
            ],
            [
                'name'  => 'Категории',
                'slug'  => 'footer-2',
                'items' => [
                    [
                        'name'  => 'Спорт',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Красота и здоровье',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Фитнес',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Партнерам',
                        'value' => '/partners'
                    ],
                ]
            ],
            [
                'name' => 'Помощь',
                'slug' => 'footer-3',
                'items' => [
                    [
                        'name'  => 'Вопрос - ответ',
                        'value' => '/faq'
                    ],
                    [
                        'name'  => 'Служба поддержки',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Правила сайта',
                        'value' => '/pages/rules'
                    ],
                    [
                        'name'  => 'Политика конфиденциальности',
                        'value' => '/pages/privacy-policy'
                    ],
                ]
            ],
            [
                'name'  => 'Навигация',
                'slug'  => 'header-nav',
                'items' => [
                    [
                        'name'  => 'О нас',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Лента записей',
                        'value' => '#'
                    ],
                    [
                        'name'  => 'Пользователи',
                        'value' => '/users'
                    ],
                    [
                        'name'  => 'Новости',
                        'value' => '/news'
                    ],
                    [
                        'name'  => 'Мероприятия',
                        'value' => '#'
                    ],
                ]
            ],
            [
                'name' => 'Меню',
                'slug' => 'header-menu',
                'items' => [
                    [
                        'name'  => 'Разместить рекламу на сайте',
                        'value' => '/pages/ads-place-on-site'
                    ],
                    [
                        'name'  => 'Промо размещение',
                        'value' => '/pages/ads-promo-placement'
                    ],
                ]
            ],
        ];

        foreach ($menus as $menu) {
            $menuModel = Menu::factory()->create([
                'name'  => $menu['name'],
                'slug'  => $menu['slug'],
            ]);

            foreach ($menu['items'] as $item) {
                MenuItem::factory()->create([
                    'name'    => $item['name'],
                    'value'   => $item['value'],
                    'menu_id' => $menuModel->id
                ]);
            }
        }
    }
}
