<?php

namespace App\Models;

use Gwd\SeoMeta\Traits\SeoMetaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, SeoMetaTrait;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public array $mediaSizes = [
        'card'      => [225, 155],
        'single'    => [825, 550]
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
