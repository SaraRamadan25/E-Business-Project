<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable=['title','description','image'];


    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }
}
