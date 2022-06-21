<?php

namespace App\Models\Dictionaries;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
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
