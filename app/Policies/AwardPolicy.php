<?php

namespace App\Policies;

use App\Models\Award\Award;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Award $award): bool
    {
        return $user->hasPermissionTo('view awards');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create awards');
    }

    public function update(User $user, Award $award): bool
    {
        return $user->hasPermissionTo('edit awards');
    }

    public function delete(User $user, Award $award): bool
    {
        return $user->hasPermissionTo('delete awards');
    }
}
