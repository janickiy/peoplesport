<?php

namespace Database\Factories\Dictionaries;

use App\Models\Dictionaries\ActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActivityType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->sentence(1),
            'occupation_id' => null
        ];
    }
}
