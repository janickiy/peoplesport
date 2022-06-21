<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = config('nova-permissions.permissions');

        $this->registerAdmin(array_keys($permissions));
        $this->registerUsers();
    }

    private function registerAdmin ($permissions = [])
    {
        $role = Role::factory()->create([
            'name' => 'Администратор',
            'slug' => 'administrator'
        ]);
        $role->setPermissions($permissions);

        return collect([
            ['login' => 'axp', 'email' => 'axp-dev@yandex.ru'],
            ['login' => 'freelance_pro', 'email' => 'freelance-pro@mail.ru'],
        ])->map(function ($attributes) use ($role) {
            $user = User::factory()->create($attributes);
            $user->roles()->attach($role);

            return $user;
        });
    }

    private function registerUsers ($permissions = [])
    {
        $role = Role::factory()->create([
            'name' => 'Пользователь',
            'slug' => 'user'
        ]);
        $role->setPermissions($permissions);

        return User::factory(5)
            ->create()
            ->each(function (User $user) use ($role) {
                $user->roles()->attach($role);
                $user->awards()->attach([1, 3]);
            });
    }
}
