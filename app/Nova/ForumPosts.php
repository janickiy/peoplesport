<?php

namespace App\Nova;

use App\Models\Forum\Post;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Mostafaznv\NovaCkEditor\CkEditor;

class ForumPosts extends Resource
{
    public static $model = Post::class;

    public static $group = 'Форум';

    public static $title = 'title';

    public static $search = [
        'id', 'title',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Автор', 'user', Users::class)
                ->searchable(),

            CkEditor::make('Контент', 'content')
                ->rules('required')
                ->stacked(),

            BelongsTo::make('Тема', 'topic', ForumTopics::class)
                ->searchable(),

            BelongsTo::make('Ответ на пост', 'replyPost', ForumPosts::class)
                ->searchable(),
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
        return 'Посты';
    }

    public static function singularLabel()
    {
        return 'Посты';
    }
}
