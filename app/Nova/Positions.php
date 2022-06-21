<?php

namespace App\Nova;

use App\Models\Dictionaries\Position;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ID;

class Positions extends Resource
{
    use TabsOnEdit;

    public static $model = Position::class;

    public static $group = 'Справочники';

    public static $priority = 3;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public static $with = [
        'users', 'activityType'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable(),

            Text::make('Заголовок', 'title')
                ->rules('required', 'max:255')
                ->sortable(),

            Text::make('Вид занятий', function () {
                return join('/', [$this->activityType->title]);
            })->onlyOnIndex(),

            Text::make('Пользователи', function () {
                return \count($this->users);
            })->onlyOnIndex(),

            HasMany::make('Пользователи', 'users', Users::class),

            HasMany::make('Вид занятий', 'activityType', ActivityTypes::class),
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
        return 'Должности';
    }

    public static function singularLabel()
    {
        return 'Должность';
    }
}
