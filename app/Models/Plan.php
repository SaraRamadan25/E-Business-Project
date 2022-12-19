<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Plan extends Model
{
    use HasFactory;

    protected $fillable=['name','price','is_true','features'];

    protected $casts = [
        'features' => 'array'
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
