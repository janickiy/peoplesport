<?php

namespace App\Providers;

use App\Helpers\NovaFields;
use App\Nova\Role;
use App\Nova\Tool\NovaSettings;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use OptimistDigital\MenuBuilder\MenuBuilder;
use Pktharindu\NovaPermissions\NovaPermissions;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Helpers\FlexibleCast;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        NovaSettings::addSettingsFields([
            Text::make('Название сайта', 'mainTitle'),
            Text::make('Описание сайта', 'mainDescription'),
            Text::make('Ключевые слова сайта', 'mainKeywords'),
            Text::make('Административный email', 'mainEmail'),
            Boolean::make('Индексация сайта', 'mainEnableFollow'),
        ]);

        NovaSettings::addSettingsFields([
            Tabs::make('Общие блоки', [
                Tab::make('Шапка', [
                    Image::make('Логотип', 'headerLogotype'),
                ]),

                Tab::make('Подвал', [
                    Image::make('Логотип', 'footerLogotype'),
                    Textarea::make('Копирайт', 'footerCopyright')->rows(2)
                ]),
            ]),
        ], [], 'Общие блоки');

        NovaSettings::addSettingsFields([
            Flexible::make('Слайдер', 'promoSlider')
                ->addLayout('Слайд', 'slide', [
                    Text::make('Заголовок', 'title'),
                    Text::make('Ссылка', 'url'),
                    Image::make('Изображение', 'image'),
                ]),
            Flexible::make('Блоки', 'promoBlocks')
                ->addLayout('Блок', 'block', [
                    Text::make('Заголовок', 'title'),
                    Text::make('Ссылка', 'url'),
                    Image::make('Изображение', 'image'),
                    Image::make('Иконка', 'icon'),
                ])
        ], [

        ], 'Главная страница');

        NovaSettings::addSettingsFields([
            Tabs::make('Баннеры', [
                Tab::make('Главная страница', [
                    Flexible::make('Список баннеров', 'homeBanners')
                        ->addLayout('Баннер', 'banner', [
                            Text::make('Ссылка', 'url'),
                            Image::make('Изображение', 'image')
                        ])
                ]),
                Tab::make('Новости', [
                    Flexible::make('Список баннеров', 'newsBanners')
                        ->addLayout('Баннер', 'banner', [
                            Text::make('Ссылка', 'url'),
                            Image::make('Изображение', 'image')
                        ])
                ]),
                Tab::make('Мероприятия', [
                    Flexible::make('Список баннеров', 'eventsBanners')
                        ->addLayout('Баннер', 'banner', [
                            Text::make('Ссылка', 'url'),
                            Image::make('Изображение', 'image')
                        ])
                ]),
            ]),
        ], [], 'Баннеры');

        NovaSettings::addSettingsFields([
            Tabs::make('Партнерам', [
                Tab::make('Связь с нами', [
                    Text::make('Заголовок', 'partnersContactsTitle'),
                    Flexible::make('Список', 'partnersContactsList')
                        ->addLayout('Пункт', 'contact', [
                            Text::make('Заголовок', 'title'),
                            Flexible::make('Список', 'list')
                                ->addLayout('Пункт', 'item', [
                                    NovaFields::makeIconContactsSelect(),
                                    Text::make('Значение', 'label'),
                                ]),
                        ]),
                ]),
                Tab::make('Обратный звонок', [
                    Text::make('Заголовок', 'partnersFeedbackTitle'),
                    Text::make('Описание', 'partnersFeedbackDescription'),
                ]),
            ]),
        ], [], 'Партнерам');
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            NovaPermissions::make()
                ->roleResource(Role::class),
            new NovaSettings,
            new MenuBuilder,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 99999;
        });
    }
}
