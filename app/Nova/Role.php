<?php

namespace App\Nova;

use App\Models\Role as RoleModel;
use Pktharindu\NovaPermissions\Nova\Role as RoleResource;

class Role extends RoleResource
{
    public static $model = RoleModel::class;

    public static $priority = 2;

    public static function label(): string
    {
        return 'Роли';
    }

    public static function singularLabel(): string
    {
        return 'Роль';
    }
}
