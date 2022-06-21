<?php

namespace App\Models\Award;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AwardCategory extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'color'
    ];

    public array $mediaSizes = [
        'icon' => [34, 34]
    ];

    public function awards(): hasMany
    {
        return $this->hasMany(Award::class, 'category_id');
    }
}
