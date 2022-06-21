<?php

namespace App\Policies;

use App\Models\Page\Faq;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Faq $faq): bool
    {
        return $user->hasPermissionTo('view pages');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create pages');
    }

    public function update(User $user, Faq $faq): bool
    {
        return $user->hasPermissionTo('edit pages');
    }

    public function delete(User $user, Faq $faq): bool
    {
        return $user->hasPermissionTo('delete pages');
    }
}
