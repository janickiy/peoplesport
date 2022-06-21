<?php

namespace App\Models\Event;

use App\Models\Model;
use Gwd\SeoMeta\Traits\SeoMetaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EventCategory extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, SeoMetaTrait;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function events(): hasMany
    {
        return $this->hasMany(Event::class, 'category_id');
    }
}
