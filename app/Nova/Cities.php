<?php

namespace App\Nova;

use App\Models\Dictionaries\City;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;

class Cities extends Resource
{
    use TabsOnEdit;

    public static $model = City::class;

    public static $group = 'Справочники';

    public static $title = 'title';

    public static $search = [
        'id', 'title',
    ];

    public static $with = [
        'users',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Название города', 'title'),

            Text::make('Пользователи', function () {
                return \count($this->users);
            })->onlyOnIndex(),

            HasMany::make('Пользователи', 'users', Users::class)
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }

    public static function label()
    {
        return 'Города';
    }

    public static function singularLabel()
    {
        return 'Город';
    }
}
