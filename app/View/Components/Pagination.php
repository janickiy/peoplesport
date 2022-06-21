<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $paginator;

    public function __construct($paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('web.components.pagination');
    }
}
