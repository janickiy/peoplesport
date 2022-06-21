<?php

namespace App\Models\Dictionaries;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'occupation_id'
    ];

    public function positions(): hasMany
    {
        return $this->hasMany(Position::class);
    }

    public function occupations(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
