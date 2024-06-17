<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Foodstall(): BelongsTo
    {
        return $this->belongsTo(Foodstall::class);
    }

    protected $fillable = [
        'user_id',
        'foodstall_id',
        'comment',
        'rating',
    ];
}
