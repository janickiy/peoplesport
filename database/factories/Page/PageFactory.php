<?php

namespace Database\Factories\Page;

use App\Models\Page\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

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
            'title'     => $title,
            'slug'      => $slug,
            'content'   => array_reduce($this->faker->paragraphs(5), fn($acc, $p) => $acc . sprintf('<p>%s</p>', $p)),
        ];
    }
}
