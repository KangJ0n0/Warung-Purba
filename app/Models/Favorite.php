<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'food_id', 'foodstall_id'];
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function foodstall()
    {
        return $this->belongsTo(Foodstall::class);
    }



}
