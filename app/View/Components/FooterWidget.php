<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use OptimistDigital\MenuBuilder\MenuBuilder;

class FooterWidget extends Component
{
    public string $title;

    public string $type; // menu

    public array $params;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $type, $params = [])
    {
        $this->title = $title;
        $this->type = $type;
        $this->params = $params;

        $this->title = match ($type) {
            'menu' => MenuBuilder::getMenuClass()::where('slug', $params['locate'])->first()->name,
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('web.components.footer-widget');
    }
}
