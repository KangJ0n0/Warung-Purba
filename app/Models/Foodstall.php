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
}
