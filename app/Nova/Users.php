<?php

namespace App\Nova;

use App\Helpers\NovaFields;
use App\Models\User;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Textarea;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Users extends Resource
{
    use TabsOnEdit;

    public static $model = User::class;

    public static $group = 'Пользователи';

    public static $priority = 1;

    public static $title = 'login';

    public static $search = [
        'id', 'name', 'email',
    ];

    public static $with = [
        'city',
    ];

    public function fields(Request $request)
    {
        return [
            Tabs::make(null, [
                Tab::make('Общая информация', [
                    ID::make()->sortable(),

                    Text::make('Логин', 'login')
                        ->sortable()
                        ->rules('required', 'max:255'),

                    Text::make('Email')
                        ->sortable()
                        ->rules('required', 'email', 'max:254')
                        ->creationRules('unique:users,email')
                        ->updateRules('unique:users,email,{{resourceId}}'),

                    Password::make('Пароль', 'password')
                        ->onlyOnForms()
                        ->creationRules('required', 'string', 'min:8')
                        ->updateRules('nullable', 'string', 'min:8'),
                ]),

                Tab::make('Профиль', [
                    Images::make('Аватар', 'avatar'),

                    Text::make('Имя', 'name'),

                    NovaBelongsToDepend::make('Пол', 'gender', Genders::class)
                        ->options(Genders::$model::all()),

                    Date::make('День рождения', 'birthday')
                        ->format('DD.MM.YYYY')
                        ->pickerDisplayFormat('d.m.Y'),

                    NovaBelongsToDepend::make('Город', 'city', Cities::class)
                        ->options(Cities::$model::all()),

                    Text::make('Образование', 'education')
                        ->hideFromIndex(),

                    Textarea::make('О себе', 'biography')
                        ->hideFromIndex()
                ]),

                Tab::make('Работа', [
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
                ]),
            ]),

            BelongsToMany::make('Роли', 'roles', Role::class),

            NovaFields::makeViewOnSiteButton('users.profile', $this->id ?: '')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function label()
    {
        return 'Пользователи';
    }

    public static function singularLabel()
    {
        return 'Пользователь';
    }
}
