<?php

namespace App\Nova;

use App\Models\Award\AwardCategory;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Timothyasp\Color\Color;

class AwardCategories extends Resource
{
    public static $model = AwardCategory::class;

    public static $group = 'Награды';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public static $with = [
        'awards',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Заголовок', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Color::make('Цвет', 'color')
                ->slider()
                ->rules('required', 'max:255'),

            Images::make('Изображение', 'image')
                ->enableExistingMedia(),

            Text::make('Награды', function () {
                return \count($this->awards);
            })->onlyOnIndex(),
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
        return 'Категории';
    }

    public static function singularLabel()
    {
        return 'Категория';
    }
}
