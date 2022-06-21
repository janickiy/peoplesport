<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\Models\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\Users',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Пользователи',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        'view admin' => [
            'display_name' => 'Просмотр админ-панели',
            'description'  => 'Можно просматривать админ-панель',
            'group'        => 'Общее',
        ],

        'view users' => [
            'display_name' => 'Просмотр пользователей',
            'description'  => 'Можно просматривать пользователей',
            'group'        => 'Пользователи',
        ],

        'create users' => [
            'display_name' => 'Создание пользователя',
            'description'  => 'Можно создавать пользователей',
            'group'        => 'Пользователи',
        ],

        'edit users' => [
            'display_name' => 'Редактирование пользователей',
            'description'  => 'Можно редактировать пользователей',
            'group'        => 'Пользователи',
        ],

        'delete users' => [
            'display_name' => 'Удаление пользователей',
            'description'  => 'Можно удалять пользователей',
            'group'        => 'Пользователи',
        ],

        'view roles' => [
            'display_name' => 'Просмотр ролей',
            'description'  => 'Можно просматирвать роли',
            'group'        => 'Роли',
        ],

        'create roles' => [
            'display_name' => 'Создание ролей',
            'description'  => 'Можно создавать роли',
            'group'        => 'Роли',
        ],

        'edit roles' => [
            'display_name' => 'Редактирование ролей',
            'description'  => 'Можно редактировать роли',
            'group'        => 'Роли',
        ],

        'delete roles' => [
            'display_name' => 'Удаление ролей',
            'description'  => 'Можно удалять роли',
            'group'        => 'Роли',
        ],

        'view news' => [
            'display_name' => 'Просмотр новостей',
            'description'  => 'Можно просматривать новости',
            'group'        => 'Новости',
        ],

        'create news' => [
            'display_name' => 'Создание новостей',
            'description'  => 'Можно создавать новости',
            'group'        => 'Новости',
        ],

        'edit news' => [
            'display_name' => 'Редактирование новостей',
            'description'  => 'Можно редактировать новости',
            'group'        => 'Новости',
        ],

        'delete news' => [
            'display_name' => 'Удаление новостей',
            'description'  => 'Можно удалять новости',
            'group'        => 'Новости',
        ],

        'view pages' => [
            'display_name' => 'Просмотр страниц',
            'description'  => 'Можно просматривать страницы',
            'group'        => 'Страницы',
        ],

        'create pages' => [
            'display_name' => 'Создание страниц',
            'description'  => 'Можно создавать страницы',
            'group'        => 'Страницы',
        ],

        'edit pages' => [
            'display_name' => 'Редактирование страниц',
            'description'  => 'Можно редактировать страницы',
            'group'        => 'Страницы',
        ],

        'delete pages' => [
            'display_name' => 'Удаление страниц',
            'description'  => 'Можно удалять страницы',
            'group'        => 'Страницы',
        ],

        'view awards' => [
            'display_name' => 'Просмотр наград',
            'description'  => 'Можно просматривать награды',
            'group'        => 'Награды',
        ],

        'create awards' => [
            'display_name' => 'Создание наград',
            'description'  => 'Можно создавать награды',
            'group'        => 'Награды',
        ],

        'edit awards' => [
            'display_name' => 'Редактирование наград',
            'description'  => 'Можно редактировать награды',
            'group'        => 'Награды',
        ],

        'delete awards' => [
            'display_name' => 'Удаление наград',
            'description'  => 'Можно удалять награды',
            'group'        => 'Награды',
        ],

        'view directories' => [
            'display_name' => 'Просмотр справочников',
            'description'  => 'Можно просматривать справочники',
            'group'        => 'Справочники',
        ],

        'create directories' => [
            'display_name' => 'Создание справочников',
            'description'  => 'Можно создавать справочники',
            'group'        => 'Справочники',
        ],

        'edit directories' => [
            'display_name' => 'Редактирование справочников',
            'description'  => 'Можно редактировать справочники',
            'group'        => 'Справочники',
        ],

        'delete directories' => [
            'display_name' => 'Удаление справочников',
            'description'  => 'Можно удалять справочники',
            'group'        => 'Справочники',
        ],

        'view menus' => [
            'display_name' => 'Просмотр меню',
            'description'  => 'Можно просматривать меню',
            'group'        => 'Меню',
        ],

        'create menus' => [
            'display_name' => 'Создание меню',
            'description'  => 'Можно создавать меню',
            'group'        => 'Меню',
        ],

        'edit menus' => [
            'display_name' => 'Редактирование меню',
            'description'  => 'Можно редактировать меню',
            'group'        => 'Меню',
        ],

        'delete menus' => [
            'display_name' => 'Удаление меню',
            'description'  => 'Можно удалять меню',
            'group'        => 'Меню',
        ],

        'change settings' => [
            'display_name' => 'Изменять настройки',
            'description'  => 'Можно изменять настройки',
            'group'        => 'Настройки',
        ],
    ],
];
