<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use AsSource;
    use HasFactory;
    protected $fillable=['name','title','excerpt','image','content','user_id'];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    public function categories(): belongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
