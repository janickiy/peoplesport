<?php

namespace App\Nova;

use App\Helpers\NovaFields;
use App\Models\Forum\Thread;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Trix;
use Mostafaznv\NovaCkEditor\CkEditor;

class ForumThreads extends Resource
{
    public static $model = Thread::class;

    public static $group = 'Форум';

    public static $priority = 1;

    public static $title = 'title';

    public static $search = [
        'id', 'title',
    ];

    public static $with = [
        'topics',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            TextWithSlug::make('Заголовок', 'title')
                ->rules('required', 'max:255')
                ->sortable()
                ->slug(),

            Slug::make('Url', 'slug')
                ->rules('required')
                ->creationRules('unique:forum_threads')
                ->updateRules('unique:forum_threads,slug,{{resourceId}}')
                ->sortable()
                ->hideFromIndex(),

            Images::make('Изображение', 'image')
                ->enableExistingMedia(),

            CkEditor::make('Описание', 'description')
                ->rules('required'),

            Boolean::make('Показывать алфавит', 'show_alphabet'),

            BelongsTo::make('Родитель', 'parent', ForumThreads::class)->nullable(),
            HasMany::make('Дети', 'children', ForumThreads::class),

            NovaFields::makeViewOnSiteButton('forum.threads', $this->slug ?: '')
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
        return 'Разделы';
    }

    public static function singularLabel()
    {
        return 'Раздел';
    }
}
