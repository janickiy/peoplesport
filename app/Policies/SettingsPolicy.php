<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsPolicy
{
    use HandlesAuthorization;

    public function view(User $user, $settings): bool {
        return $user->hasPermissionTo('change settings');
    }

    public function create(User $user): bool {
        return $user->hasPermissionTo('change settings');
    }

    public function update(User $user, $settings): bool {
        return $user->hasPermissionTo('change settings');
    }

    public function delete(User $user, $settings): bool {
        return $user->hasPermissionTo('change settings');
    }
}
