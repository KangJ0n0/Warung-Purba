<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
   
    
    public function favoriteFoodstalls()
    {
        return $this->belongsToMany(Foodstall::class, 'favorites', 'user_id', 'foodstall_id')
                    ->withTimestamps();
    }
    
    public function favoriteFoods()
    {
        return $this->belongsToMany(Food::class, 'user_favorite_foods')->withTimestamps();
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
{
    //if you are using spatie roles and permissions, you can use the `hasRole` or `hasPermissions` methods 
    return $this->hasRole(['admin']);
}
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
}
