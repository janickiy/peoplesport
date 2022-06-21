<?php

namespace Database\Factories\Dictionaries;

use App\Models\Dictionaries\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

class OccupationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Occupation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(1),
        ];
    }
}
