<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        

        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $favorite->food_id = $request->food_id;

        // Check if the favorite already exists
        if (!Favorite::where('user_id', Auth::id())->where('food_id', $request->food_id)->exists()) {
            $favorite->save();
            return back()->with('success', 'Food bookmarked successfully!');
        } else {
            return back()->with('info', 'This food is already in your favorites.');
        }
    }
}
