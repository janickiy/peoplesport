<?php

namespace Database\Seeders;

use App\Models\Forum\Post;
use App\Models\Forum\Thread;
use App\Models\Forum\Topic;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = [
            [
                'title'     => 'Спорт',
                'children'  => [
                    ['title' => 'Футбол'],
                    ['title' => 'Ралли'],
                ]
            ],
            [
                'title'     => 'Web разработка',
                'children'  => [
                    ['title' => 'Создание сайтов']
                ]
            ],
        ];

        foreach ($threads as $thread) {
            $threadModel = Thread::factory()->create([
                'title' => $thread['title']
            ]);

            if ($thread['children']) {
                foreach ($thread['children'] as $child) {
                    $threadModel = Thread::factory()->create([
                        'title'     => $child['title'],
                        'parent_id' => $threadModel->id
                    ]);
                }
            }
        }

        Topic::factory(10)
            ->count(15)
            ->create()
            ->each(function (Topic $topic) {
                foreach (range(1, 10) as $index) {
                    if ($index == 1) {
                        Post::factory()
                            ->count(1)
                            ->create([
                                'topic_id'  => $topic->id,
                                'user_id'   => $topic->user_id,
                            ]);
                    } else {
                        Post::factory()
                            ->count(1)
                            ->create();
                    }
                }
            });
    }
}
