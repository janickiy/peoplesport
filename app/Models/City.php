<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
