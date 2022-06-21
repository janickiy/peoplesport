<?php

namespace App\Nova;

use App\Models\Menu\Menu;
use OptimistDigital\MenuBuilder\Nova\Resources\MenuResource;

class Menus extends MenuResource
{
    public static $model = Menu::class;
}
