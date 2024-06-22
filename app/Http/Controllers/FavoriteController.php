<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $favoriteFoodstalls = $user->favorites()->with('foodstall')->whereNotNull('foodstall_id')->get();
            $favoriteFoods = $user->favorites()->with('food')->whereNotNull('food_id')->get();

            return view('catatan', compact('favoriteFoodstalls', 'favoriteFoods'));
        } else {
            return view('catatan');
        }
    }

    public function toggleFavorite(Request $request)
    {
        $user = Auth::user();

        // Determine if it's a foodstall or food being favorited
        if ($request->has('foodstall_id')) {
            $favorite = Favorite::where('user_id', $user->id)
                                ->where('foodstall_id', $request->foodstall_id)
                                ->first();
            $favoriteType = 'foodstall';
        } elseif ($request->has('food_id')) {
            $favorite = Favorite::where('user_id', $user->id)
                                ->where('food_id', $request->food_id)
                                ->first();
            $favoriteType = 'food';
        } else {
            return back()->with('error', 'Invalid request.');
        }

        // Toggle favorite
        if ($favorite) {
            $favorite->delete();
            $message = $favoriteType == 'foodstall' ? 'Foodstall removed from favorites.' : 'Food removed from favorites.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'foodstall_id' => $request->foodstall_id ?? null,
                'food_id' => $request->food_id ?? null,
            ]);
            $message = $favoriteType == 'foodstall' ? 'Foodstall added to favorites.' : 'Food added to favorites.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->has('food_id')) {
            $favoriteType = 'food';
            $itemId = $request->food_id;
        } elseif ($request->has('foodstall_id')) {
            $favoriteType = 'foodstall';
            $itemId = $request->foodstall_id;
        } else {
            return back()->with('error', 'Invalid request.');
        }

        // Check if the favorite already exists
        if (!Favorite::where('user_id', $user->id)
                     ->where(function ($query) use ($itemId, $favoriteType) {
                         if ($favoriteType === 'food') {
                             $query->where('food_id', $itemId);
                         } elseif ($favoriteType === 'foodstall') {
                             $query->where('foodstall_id', $itemId);
                         }
                     })
                     ->exists()) {
            // Create the favorite
            Favorite::create([
                'user_id' => $user->id,
                'food_id' => $favoriteType === 'food' ? $itemId : null,
                'foodstall_id' => $favoriteType === 'foodstall' ? $itemId : null,
            ]);

            $message = $favoriteType === 'food' ? 'Food bookmarked successfully!' : 'Food stall bookmarked successfully!';
            return back()->with('success', $message);
        } else {
            $message = $favoriteType === 'food' ? 'This food is already in your favorites.' : 'This food stall is already in your favorites.';
            return back()->with('info', $message);
        }
    }
}
