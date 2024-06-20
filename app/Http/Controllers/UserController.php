<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Fetch the reviews with pagination
        $reviews = $user->reviews()->paginate(1); // 3 reviews per page
        
        return view('users.show', compact('user', 'reviews'));
    }
}
