<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'headerLogotype'    => '',
            'footerLogotype'    => '',
            'footerCopyright'   => 'Copyright 2020 ©'.PHP_EOL.'PeopleTok - эффективное общение. Все права защищены.',
            'promoSlider'       => json_encode($this->generatePromoSlider()),
            'promoBlocks'       => json_encode($this->generatePromoBlock()),
            'partnersContactsTitle'         => 'Свяжитесь с нами',
            'partnersContactsList'          => json_encode($this->generatePartnersContactsList()),
            'partnersFeedbackTitle'         => 'Закажите обратный звонок',
            'partnersFeedbackDescription'   => 'Пожалуйста оставьте свои контактные данные и наши менеджеры свяжутся с вами в ближайшее время',
        ];

        foreach ($settings as $key => $value) {
            Settings::factory()->create([
                'key'   => $key,
                'value' => $value
            ]);
        }
    }

    private function generatePartnersContactsList(): array
    {
        $headers = ['Менеджер партнерской программы', 'Менеджер по рекламе', 'Директор компании'];
        $items = [
            ['phone', 'Тел: +7 (800) 000-00-00'],
            ['phone', 'Тел: +7 (800) 000-00-00'],
            ['envelope', 'Email: example@example.com'],
            ['envelope', 'Email: example@example.com'],
            ['fax', 'Факс: example@example.com'],
        ];

        return array_map(function ($name) use ($items) {
            return [
                'layout'        => 'contact',
                'key'           => Str::random(),
                'attributes'    => [
                    'title' => $name,
                    'list'  => array_map(function($item) {
                        return [
                            'layout'        => 'item',
                            'key'           => Str::random(),
                            'attributes'    => [
                                'icon' => $item[0],
                                'label'   => $item[1]
                            ]
                        ];
                    }, $items)
                ]
            ];
        }, $headers);
    }

    private function generatePromoSlider(): array
    {
        return array_map(function ($index) {
            return [
                'layout'        => 'block',
                'key'           => Str::random(),
                'attributes'    => [
                    'title' => 'Слайд' . $index,
                    'url'   => '#'
                ]
            ];
        }, range(1, 4));
    }

    private function generatePromoBlock(): array
    {
        return array_map(function ($index) {
            return [
                'layout'        => 'block',
                'key'           => Str::random(),
                'attributes'    => [
                    'title' => 'Блок' . $index,
                    'url'   => '#'
                ]
            ];
        }, range(1, 4));
    }
}
