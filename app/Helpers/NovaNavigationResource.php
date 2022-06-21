<?php

namespace App\Helpers;

use Laravel\Nova\Nova;

class NovaNavigationResource
{
    static public array $customItems = [
        'Страницы' => [
            ['label' => 'Партнерам', 'url' => '/settings/partneram']
        ]
    ];

    static public function get()
    {
        $items = self::$customItems;
        $navigation = Nova::groupedResourcesForNavigation(request());

        foreach ($navigation as $group => $resources) {
            if (!isset($items[$group])) {
                $items[$group] = [];
            }

            foreach ($resources as $resource) {
                array_unshift($items[$group], [
                    'label' => $resource::label(),
                    'url'   => sprintf('/resources/%s', $resource::uriKey())
                ]);
            }
        }

        return $items;
    }
}
