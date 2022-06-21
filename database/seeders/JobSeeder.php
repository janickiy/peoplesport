<?php

namespace Database\Seeders;

use App\Models\Dictionaries\ActivityType;
use App\Models\Dictionaries\Occupation;
use App\Models\Dictionaries\Position;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = [
            [
                'title'            => 'Спорт',
                'activityTypes'    => [
                    [
                        'title'     => 'Футбол',
                        'positions' => [
                            ['title' => 'Тренер'],
                            ['title' => 'Менеджер'],
                            ['title' => 'Игрок'],
                        ]
                    ],
                    [
                        'title'     => 'Ралли',
                        'positions' => [
                            ['title' => 'Пилот'],
                            ['title' => 'Штурман'],
                        ]
                    ],
                ]
            ],
            [
                'title'            => 'Web разработка',
                'activityTypes'    => [
                    [
                        'title'     => 'Создание сайтов',
                        'positions' => [
                            ['title' => 'Frontend разработчик'],
                            ['title' => 'Backend разработчик'],
                        ]
                    ],
                ]
            ],
        ];

        foreach ($occupations as $occupation) {
            $occupationModel = Occupation::factory()->create([
                'title' => $occupation['title']
            ]);

            foreach ($occupation['activityTypes'] as $activityType) {
                $activityTypeModel = ActivityType::factory()->create([
                    'title'         => $activityType['title'],
                    'occupation_id' => $occupationModel->id
                ]);

                foreach ($activityType['positions'] as $position) {
                    Position::factory()->create([
                        'title'             => $position['title'],
                        'activity_type_id'  => $activityTypeModel->id
                    ]);
                }
            }
        }
    }
}
