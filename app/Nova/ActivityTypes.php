<?php

namespace App\Nova;

use App\Models\Dictionaries\ActivityType;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ID;

class ActivityTypes extends Resource
{
    use TabsOnEdit;

    public static $model = ActivityType::class;

    public static $group = 'Справочники';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public static $with = [
        'users', 'occupations'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Заголовок', 'title')
                ->rules('required', 'max:255')
                ->sortable(),

            Text::make('Должность', function () {
                return count($this->positions);
            })->onlyOnIndex(),

            Text::make('Пользователи', function () {
                return \count($this->users);
            })->onlyOnIndex(),

            HasMany::make('Пользователи', 'users', Users::class),

            HasMany::make('Род занятий', 'positions', Positions::class),

            //BelongsTo::make('Род занятий', 'positions', Positions::class),
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
        return 'Вид занятий';
    }

    public static function singularLabel()
    {
        return 'Вид занятия';
    }
}
