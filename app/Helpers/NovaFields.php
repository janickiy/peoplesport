<?php

namespace App\Helpers;

use Laravel\Nova\Fields\Select;
use NovaButton\Button;

class NovaFields
{
    static public function makeViewOnSiteButton($route, $params = [])
    {
        return Button::make('Перейти')
            ->title('Открыть на сайте')
            ->link(route($route, $params));
    }

    static public function makeIconContactsSelect($label = 'Иконка', $name = 'icon')
    {
        return Select::make($label, $name)
            ->options([
                'phone' => 'Телефон',
                'envelope' => 'Почта',
                'fax' => 'Факс',
            ]);
    }
}
