<?php

namespace App\Nova;

use App\Helpers\NovaFields;
use App\Models\Forum\Topic;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;

class ForumTopics extends Resource
{
    public static $model = Topic::class;

    public static $group = 'Форум';

    public static $priority = 2;

    public static $title = 'title';

    public static $search = [
        'id', 'title',
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
                ->creationRules('unique:forum_topics')
                ->updateRules('unique:forum_topics,slug,{{resourceId}}')
                ->sortable()
                ->hideFromIndex(),

            BelongsTo::make('Раздел', 'thread', ForumThreads::class)
                ->searchable(),

            BelongsTo::make('Автор', 'user', Users::class)
                ->searchable(),

            NovaFields::makeViewOnSiteButton('forum.topic', $this->id ?: '')
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
        return 'Темы';
    }

    public static function singularLabel()
    {
        return 'Тема';
    }
}
