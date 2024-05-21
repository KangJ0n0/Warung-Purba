<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    protected $fillable = [
        'food_name',
        'foodstall_id',
        'food_price',
        'food_pict',
    ];

    
}
