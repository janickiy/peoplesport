<?php

namespace App\Nova;

use App\Models\Dictionaries\Occupation;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ID;

class Occupations extends Resource
{
    use TabsOnEdit;

    public static $model = Occupation::class;

    public static $group = 'Справочники';

    public static $priority = 1;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public static $with = [
        'users', 'activityTypes'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Заголовок', 'title')
                ->rules('required', 'max:255')
                ->sortable(),

            Text::make('Виды занятий', function () {
                return count($this->activityTypes);
            })->onlyOnIndex(),

            Text::make('Пользователи', function () {
                return count($this->users);
            })->onlyOnIndex(),

            HasMany::make('Виды занятий', 'activityTypes', ActivityTypes::class),

            HasMany::make('Пользователи', 'users', Users::class),
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
        return 'Род занятий';
    }

    public static function singularLabel()
    {
        return 'Род занятния';
    }
}
