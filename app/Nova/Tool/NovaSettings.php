<?php

namespace App\Nova\Tool;

use OptimistDigital\NovaSettings\NovaSettings as Tool;

class NovaSettings extends Tool
{
    public array $navigationFields = [
        'general'           => 'Основные',
        'obshhie-bloki'     => 'Общие блоки',
        'glavnaya-stranica' => 'Главная страница',
        'bannery'           => 'Баннеры',
    ];

    public function renderNavigation()
    {
        return view('nova-settings::navigation', [
            'fields' => $this->navigationFields,
            'basePath' => config('nova-settings.base_path', 'nova-settings'),
        ]);
    }
}
