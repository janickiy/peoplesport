<?php

namespace App\Nova;

use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Mostafaznv\NovaCkEditor\CkEditor;

class Faq extends Resource
{
    use TabsOnEdit;

    public static $model = \App\Models\Page\Faq::class;

    public static $group = 'Страницы';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Заголовок', 'title')
                ->sortable(),

            CkEditor::make('Контент', 'content')
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
        return 'FAQ';
    }

    public static function singularLabel()
    {
        return 'FAQ страница';
    }
}
