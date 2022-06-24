<?php

namespace App\Nova;

use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Mostafaznv\NovaCkEditor\CkEditor;

class Support extends Resource
{
    use TabsOnEdit;

    public static $model = \App\Models\Support::class;

    public static $group = 'Страницы';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    /**
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Тема', 'subject')
                ->sortable(),

            Text::make('Имя', 'name')
                ->sortable(),

            Text::make('Email', 'email')
                ->sortable(),

            CkEditor::make('Сообщение', 'message')
                ->rules('required'),
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     * @return array]
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * @return string
     */
    public static function label()
    {
        return 'Обратная связь';
    }

    /**
     * @return string
     */
    public static function singularLabel()
    {
        return 'Обратная связь';
    }

    public function authorizedToView(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

}
