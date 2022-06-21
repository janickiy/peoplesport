<?php

namespace App\Models\Page;

use Gwd\SeoMeta\Traits\SeoMetaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, HasFactory, SeoMetaTrait;

    protected $fillable = [
        'title',
        'content'
    ];
}
