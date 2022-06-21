<?php

namespace Database\Factories\Event;

use App\Models\Dictionaries\Occupation;
use App\Models\Event\Event;
use App\Models\Event\EventCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);
        $occupation = Occupation::inRandomOrder()->first();
        $activityType = $occupation->activityTypes->shuffle()->first();
        $position = $activityType->positions->shuffle()->first();

        return [
            'title'             => $title,
            'slug'              => $slug,
            'content'           => $this->faker->text,
            'started_at'        => $this->faker->dateTimeInInterval('-7 days', '+ 5 days'),
            'speaker'           => 'Марина Подгорина (врач-косметолог высшей категории)',
            'user_id'           => User::inRandomOrder()->first()->id,
            'category_id'       => EventCategory::inRandomOrder()->first()->id,
            'occupation_id'     => $occupation->id,
            'activity_type_id'  => $activityType->id,
            'position_id'       => $position->id,
        ];
    }
}
