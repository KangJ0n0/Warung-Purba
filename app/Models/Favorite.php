<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'user_favorite_foods';

    protected $fillable = [
        'user_id',
        'food_id',
    ];
}
