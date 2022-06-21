<?php

namespace Database\Factories\Menu;

use App\Models\Menu\Menu;
use App\Models\Menu\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_id'   => Menu::inRandomOrder()->first()->id,
            'name'      => $this->faker->name,
            'locale'    => array_keys(config('nova-menu.locales'))[0],
            'class'     => \OptimistDigital\MenuBuilder\MenuItemTypes\MenuItemStaticURLType::class,
            'value'     => '#',
            'target'    => '_self',
            'data'      => null,
            'parent_id' => null,
            'order'     => MenuItem::count(),
            'enabled'   => 1
        ];
    }
}
