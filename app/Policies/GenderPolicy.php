<?php

namespace App\Policies;

use App\Models\Dictionaries\Gender;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Gender $gender): bool {
        return $user->hasPermissionTo('view directories');
    }

    public function create(User $user): bool {
        return $user->hasPermissionTo('create directories');
    }

    public function update(User $user, Gender $gender): bool {
        return $user->hasPermissionTo('edit directories');
    }

    public function delete(User $user, Gender $gender): bool {
        return $user->hasPermissionTo('delete directories');
    }
}
