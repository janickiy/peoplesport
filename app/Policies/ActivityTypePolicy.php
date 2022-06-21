<?php

namespace App\Policies;

use App\Models\Dictionaries\ActivityType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityTypePolicy
{
    use HandlesAuthorization;

    public function view(User $user, ActivityType $activityType): bool
    {
        return $user->hasPermissionTo('view directories');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create directories');
    }

    public function update(User $user, ActivityType $activityType): bool
    {
        return $user->hasPermissionTo('edit directories');
    }

    public function delete(User $user, ActivityType $activityType): bool
    {
        return $user->hasPermissionTo('delete directories');
    }
}
