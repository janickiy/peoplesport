<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

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
            'description'   => $this->faker->text,
            'show_alphabet' => rand(0, 1),
            'parent_id'     => null
        ];
    }
}
