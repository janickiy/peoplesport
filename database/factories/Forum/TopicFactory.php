<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Thread;
use App\Models\Forum\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);

        return [
            'title'         => $title,
            'slug'          => $slug,
            'description'   => $this->faker->sentence(),
            'thread_id'     => Thread::inRandomOrder()->first()->id,
            'user_id'       => User::inRandomOrder()->first()->id
        ];
    }
}
