<?php

namespace Database\Factories\Page;

use App\Models\Page\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title'     => $title,
            'content'   => array_reduce($this->faker->paragraphs(5), fn($acc, $p) => $acc . sprintf('<p>%s</p>', $p)),
        ];
    }
}
