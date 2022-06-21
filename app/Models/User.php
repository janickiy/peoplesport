<?php

namespace App\Models;

use App\Models\Award\Award;
use App\Models\Dictionaries\ActivityType;
use App\Models\Dictionaries\City;
use App\Models\Dictionaries\Gender;
use App\Models\Dictionaries\Occupation;
use App\Models\Dictionaries\Position;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Pktharindu\NovaPermissions\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, HasRoles, HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'login',
        'password',
        'gender',
        'birthday',
        'city_id',
        'education',
        'biography',
        'occupation_id',
        'activity_type_id',
        'position_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'date',
        'deleted_at'        => 'date',
        'seen_at'           => 'date',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function gender(): belongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function city(): belongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }

    public function activityType(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(Award::class);
    }

    public function avatar(): string
    {
        return $this->hasMedia('avatar')
            ? $this->getFirstMediaUrl('avatar')
            : sprintf('https://secure.gravatar.com/avatar/%s?size=512', md5(Str::lower($this->email)));
    }

    public function isOnline(): bool
    {
        return $this->seen_at > Carbon::now()->subMinutes(5);
    }
}
