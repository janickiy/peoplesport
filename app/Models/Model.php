<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

abstract class Model extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    public array $mediaSizes = [];

    public function registerMediaConversions(Media $media = null): void
    {
        foreach ($this->mediaSizes as $name => $sizes) {
            $this->addMediaConversion($name)
                ->width($sizes[0])
                ->height($sizes[1]);
        }
    }

    public function image($size = 'card', $collection = 'image')
    {
        return $this->getFirstMediaUrl($collection, $size) ?: sprintf('https://via.placeholder.com/%sx%s', ...$this->mediaSizes[$size]);
    }
}
