<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Foodstall extends Model
{
    use HasFactory;

    public function foodstall(): BelongsTo
    {
        return $this->belongsTo(Foodstall::class);
    }

    protected $fillable = [
        'foodstall_name',
        'foodstall_location',
        'foodstall_desc',
        'foodstall_pict',
        'foodstall_contact',
        'foodstall_rating',
        
    ];
}
