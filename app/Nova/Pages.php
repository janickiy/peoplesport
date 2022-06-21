<?php

namespace App\Nova;

use App\Helpers\NovaFields;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Eminiarts\Tabs\TabsOnEdit;
use Gwd\SeoMeta\SeoMeta;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Trix;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
use Mostafaznv\NovaCkEditor\CkEditor;

class Pages extends Resource
{
    use TabsOnEdit;

    public static $model = \App\Models\Page\Page::class;

    public static $group = 'Страницы';

    public static $priority = 1;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Tabs::make(null, [
                Tab::make('Общая информация', [
                    TextWithSlug::make('Заголовок', 'title')
                        ->rules('required', 'max:255')
                        ->sortable()
                        ->slug(),

                    Slug::make('Url', 'slug')
                        ->rules('required')
                        ->creationRules('unique:news')
                        ->updateRules('unique:news,slug,{{resourceId}}')
                        ->sortable()
                        ->hideFromIndex(),

                    CkEditor::make('Контент', 'content')
                        ->rules('required'),
                ]),

                Tab::make('SEO', [
                    SeoMeta::make('SEO', 'seo_meta')
                ]),
            ]),

            NovaFields::makeViewOnSiteButton('static.single', $this->slug ?: '')
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
        return 'Текстовые';
    }

    public static function singularLabel()
    {
        return 'Текстовая страница';
    }
}
