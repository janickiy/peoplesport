<?php

namespace App\Models\Event;

use App\Models\Dictionaries\ActivityType;
use App\Models\Dictionaries\Occupation;
use App\Models\Dictionaries\Position;
use App\Models\Model;
use App\Models\User;
use Gwd\SeoMeta\Traits\SeoMetaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, SeoMetaTrait;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'started_at',
        'speaker',
        'user_id',
        'category_id',
        'occupation_id',
        'activity_type_id',
        'position_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'deleted_at' => 'date',
    ];

    public array $mediaSizes = [
        'card'      => [225, 155],
        'single'    => [825, 550]
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
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
}
