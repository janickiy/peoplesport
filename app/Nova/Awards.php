<?php

namespace App\Nova;

use App\Models\Award\Award;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Mostafaznv\NovaCkEditor\CkEditor;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Awards extends Resource
{
    public static $model = Award::class;

    public static $group = 'Награды';

    public static $priority = 1;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Заголовок', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaBelongsToDepend::make('Категория', 'category', AwardCategories::class)
                ->options(AwardCategories::$model::all()),

            Images::make('Изображение', 'image')
                ->enableExistingMedia(),

            CkEditor::make('Описание', 'description')
                ->rules('required'),
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
        return 'Награды';
    }

    public static function singularLabel()
    {
        return 'Награда';
    }
}
