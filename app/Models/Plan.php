<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Plan extends Model
{
    protected $guarded=[];

    protected $casts = [
        'features' => 'array'
    ];

    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
