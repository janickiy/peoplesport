<?php

namespace App\Nova;

use App\Models\Event\EventCategory;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Gwd\SeoMeta\SeoMeta;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class EventCategories extends Resource
{
    public static $model = EventCategory::class;

    public static $group = 'Мероприятия';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public static $with = [
        'events',
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

                    Text::make('Мероприятия', function () {
                        return \count($this->events);
                    })->onlyOnIndex(),
                ]),
                Tab::make('SEO', [
                    SeoMeta::make('SEO', 'seo_meta')
                ]),
            ])
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
