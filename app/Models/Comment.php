<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['name','email','content','post_id','user_id'];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function post(): belongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function news(): belongsTo
    {
        return $this->belongsTo(News::class);
    }
}
