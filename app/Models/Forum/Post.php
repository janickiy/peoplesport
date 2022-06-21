<?php

namespace App\Models\Forum;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'forum_posts';

    protected $fillable = [
        'content',
        'topic_id',
        'reply_post_id',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function replyPost(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
