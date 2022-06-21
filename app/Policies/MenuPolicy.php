<?php

namespace App\Policies;

use App\Models\Menu\Menu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Menu $menu): bool
    {
        return $user->hasPermissionTo('view menus');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create menus');
    }

    public function update(User $user, Menu $menu): bool
    {
        return $user->hasPermissionTo('edit menus');
    }

    public function delete(User $user, Menu $menu): bool
    {
        return $user->hasPermissionTo('delete menus');
    }
}
