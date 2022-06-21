<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Post;
use App\Models\Forum\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => User::inRandomOrder()->first()->id,
            'topic_id'      => Topic::inRandomOrder()->first()->id,
            'reply_post_id' => null,
            'content'       => sprintf('<p>%s</p>', $this->faker->text),
        ];
    }
}
