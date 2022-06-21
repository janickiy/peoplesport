<?php

namespace App\Policies;

use App\Models\Award\AwardCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardCategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AwardCategory $awardCategory): bool
    {
        return $user->hasPermissionTo('view awards');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create awards');
    }

    public function update(User $user, AwardCategory $awardCategory): bool
    {
        return $user->hasPermissionTo('edit awards');
    }

    public function delete(User $user, AwardCategory $awardCategory): bool
    {
        return $user->hasPermissionTo('delete awards');
    }
}
