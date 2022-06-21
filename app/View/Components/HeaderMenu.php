<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderMenu extends Component
{
    public $menu;

    public $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($locate, $classes = [])
    {
        $this->menu = nova_get_menu_by_slug($locate);
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('web.components.header-menu');
    }
}
