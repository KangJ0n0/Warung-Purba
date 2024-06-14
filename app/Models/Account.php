<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected $fillable = [
        'account_name',
        'email',
        'password',
        'account_pict',
        'account_desc',
        'role',
    ];
}
