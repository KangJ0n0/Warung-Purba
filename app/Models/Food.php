<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Food extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_favorite_foods')->withTimestamps();
    }
    public function foodstall()
  {
    return $this->belongsTo(Foodstall::class, 'foodstall_id');
  }

    protected $fillable = [
        
        'food_name',
        'foodstall_id',
        'food_price',
        'food_pict',
    ];

    
}
