<?php

namespace App\Models\Forum;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Thread extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $table = 'forum_threads';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'show_alphabet',
        'parent_id'
    ];

    protected $casts = [
        'show_alphabet' => 'boolean'
    ];

    public array $mediaSizes = [
        'icon' => [50, 50]
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Thread::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Thread::class, 'parent_id');
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
