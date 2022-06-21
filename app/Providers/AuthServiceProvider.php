<?php

namespace App\Providers;

use App\Models\Dictionaries\ActivityType;
use App\Models\Dictionaries\City;
use App\Models\Dictionaries\Gender;
use App\Models\Menu\Menu;
use App\Models\Dictionaries\Occupation;
use App\Models\Page\Page;
use App\Models\Page\Faq;
use App\Models\Dictionaries\Position;
use App\Models\Role;
use App\Models\Award\Award;
use App\Models\News;
use App\Models\Settings;
use App\Models\User;
use App\Policies\ActivityTypePolicy;
use App\Policies\AwardPolicy;
use App\Policies\CityPolicy;
use App\Policies\FaqPolicy;
use App\Policies\GenderPolicy;
use App\Policies\MenuPolicy;
use App\Policies\NewsPolicy;
use App\Policies\OccupationPolicy;
use App\Policies\PagePolicy;
use App\Policies\PositionPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingsPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    protected $policies = [
        Role::class         => RolePolicy::class,
        User::class         => UserPolicy::class,
        News::class         => NewsPolicy::class,
        Award::class        => AwardPolicy::class,
        Occupation::class   => OccupationPolicy::class,
        ActivityType::class => ActivityTypePolicy::class,
        Position::class     => PositionPolicy::class,
        City::class         => CityPolicy::class,
        Gender::class       => GenderPolicy::class,
        Page::class         => PagePolicy::class,
        Faq::class          => FaqPolicy::class,
        Menu::class         => MenuPolicy::class,
        Settings::class     => SettingsPolicy::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach (config('nova-permissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }
    }
}
