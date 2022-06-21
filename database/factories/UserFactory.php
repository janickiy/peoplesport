<?php

namespace Database\Factories;

use App\Models\Dictionaries\City;
use App\Models\Dictionaries\Gender;
use App\Models\Dictionaries\Occupation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $occupation = Occupation::inRandomOrder()->first();
        $activityType = $occupation->activityTypes->shuffle()->first();
        $position = $activityType->positions->shuffle()->first();

        return [
            'login'             => mb_strtolower($this->faker->firstName),
            'name'              => $this->faker->firstName,
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'birthday'          => $this->faker->date(),
            'gender_id'         => Gender::inRandomOrder()->first()->id,
            'city_id'           => City::inRandomOrder()->first()->id,
            'education'         => rand(0, 1) ? $this->faker->sentence : null,
            'biography'         => rand(0, 1) ? $this->faker->paragraph : null,
            'occupation_id'     => $occupation->id,
            'activity_type_id'  => $activityType->id,
            'position_id'       => $position->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
