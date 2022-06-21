<?php

namespace App\Nova;

use App\Helpers\NovaFields;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Eminiarts\Tabs\TabsOnEdit;
use Gwd\SeoMeta\SeoMeta;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
use Mostafaznv\NovaCkEditor\CkEditor;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Events extends Resource
{
    use TabsOnEdit;

    public static $model = \App\Models\Event\Event::class;

    public static $group = 'Мероприятия';

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

                    Images::make('Изображение', 'image')
                        ->enableExistingMedia(),

                    Date::make('Состоится', 'started_at')
                        ->rules('required'),

                    Text::make('Проводит', 'speaker')
                        ->rules('required'),

                    CkEditor::make('Контент', 'content')
                        ->rules('required'),

                    NovaBelongsToDepend::make('Категория', 'category', AwardCategories::class)
                        ->options(AwardCategories::$model::all()),

                    NovaBelongsToDepend::make('Род занятия', 'occupation', Occupations::class)
                        ->hideFromIndex()
                        ->options(Occupations::$model::all()),

                    NovaBelongsToDepend::make('Вид занятия', 'activityType', ActivityTypes::class)
                        ->hideFromIndex()
                        ->optionsResolve(function ($occupation) {
                            return $occupation->activityTypes()->get(['id','title']);
                        })
                        ->dependsOn('occupation'),
                    NovaBelongsToDepend::make('Должность', 'position', Positions::class)
                        ->optionsResolve(function ($depends) {
                            return $depends->activitytype->positions()->get(['id','title']);
                        })
                        ->hideFromIndex()
                        ->dependsOn('occupation', 'activityType'),

                    BelongsTo::make('Автор', 'user', Users::class)
                        ->searchable(),
                ]),

                Tab::make('SEO', [
                    SeoMeta::make('SEO', 'seo_meta')
                ]),
            ]),

            NovaFields::makeViewOnSiteButton('events.single', $this->slug ?: '')
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
        return 'Мероприятия';
    }

    public static function singularLabel()
    {
        return 'Событие';
    }
}
