<?php

namespace App\Policies;

use App\Models\Dictionaries\Position;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Position $position): bool {
        return $user->hasPermissionTo('view directories');
    }

    public function create(User $user): bool {
        return $user->hasPermissionTo('create directories');
    }

    public function update(User $user, Position $position): bool {
        return $user->hasPermissionTo('edit directories');
    }

    public function delete(User $user, Position $position): bool {
        return $user->hasPermissionTo('delete directories');
    }
}
