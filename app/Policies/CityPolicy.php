<?php

namespace App\Policies;

use App\Models\Dictionaries\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    public function view(User $user, City $city): bool {
        return $user->hasPermissionTo('view directories');
    }

    public function create(User $user): bool {
        return $user->hasPermissionTo('create directories');
    }

    public function update(User $user, City $city): bool {
        return $user->hasPermissionTo('edit directories');
    }

    public function delete(User $user, City $city): bool {
        return $user->hasPermissionTo('delete directories');
    }
}
