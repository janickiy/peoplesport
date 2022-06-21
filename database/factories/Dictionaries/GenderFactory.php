<?php

namespace Database\Factories\Dictionaries;

use App\Models\Dictionaries\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gender::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
        ];
    }
}
