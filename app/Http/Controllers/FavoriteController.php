<?php

namespace App\Http\Controllers;

use App\Models\Foodstall;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavoriteFoodstall(Request $request, Foodstall $foodstall)
    {
        $user = Auth::user();
        
        if ($user->favoriteFoodstalls()->where('foodstall_id', $foodstall->id)->exists()) {
            $user->favoriteFoodstalls()->detach($foodstall);
            $message = 'Foodstall removed from favorites.';
        } else {
            $user->favoriteFoodstalls()->attach($foodstall);
            $message = 'Foodstall added to favorites.';
        }
        
        return redirect()->back()->with('success', $message);
    }
    
    public function toggleFavoriteFood(Request $request, Food $food)
    {
        $user = Auth::user();
        
        if ($user->favoriteFoods()->where('food_id', $food->id)->exists()) {
            $user->favoriteFoods()->detach($food);
            $message = 'Food removed from favorites.';
        } else {
            $user->favoriteFoods()->attach($food);
            $message = 'Food added to favorites.';
        }
        
        return redirect()->back()->with('success', $message);
    }
}
