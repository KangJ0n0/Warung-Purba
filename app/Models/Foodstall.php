<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodstall extends Model
{
    use HasFactory;

    protected $fillable = [
        'foodstall_name',
        'foodstall_location',
        'foodstall_desc',
        'foodstall_pict',
        'foodstall_contact',
        'foodstall_rating',
        
    ];

        // Define the relationship with Food
        public function foods()
        {
            return $this->hasMany(Food::class, 'foodstall_id');
        }
    
        // Define the relationship with Review
        public function reviews()
        {
            return $this->hasMany(Review::class, 'foodstall_id', 'id');
        }

        public function users()
        {
            return $this->belongsToMany(User::class, 'user_favorite_foodstalls')->withTimestamps();
        }

        public function show($id)
{
    $foodstall = Foodstall::with('reviews.user')->findOrFail($id);
    return view('foodstalls.show', compact('foodstall'));
}

}
