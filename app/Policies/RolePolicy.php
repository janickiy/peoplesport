<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Pktharindu\NovaPermissions\Policies\Policy;

class RolePolicy extends Policy
{
    use HandlesAuthorization;

    public $disableDeleteEntity = [
        1, // administrator
        2, // user
    ];

    public function view(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('view roles');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create roles');
    }

    public function update(User $user, Role $role): bool
    {
        return $user->hasPermissionTo('edit roles');
    }

    public function delete(User $user, Role $role): bool
    {
        if (in_array($role->id, $this->disableDeleteEntity)) {
            return false;
        }

        return $user->hasPermissionTo('delete roles');
    }
}
