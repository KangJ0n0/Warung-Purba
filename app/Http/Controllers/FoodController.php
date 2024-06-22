<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request) : View
    {
        // Get the search query
        $query = $request->input('search');

        // Get foods filtered by search query
        $foods = Food::query()
            ->where('food_name', 'like', '%' . $query . '%')
            ->latest()
            ->paginate(10);

        // Render view with filtered foods
        return view('makanan', compact('foods'));
    }

    public function show($id)
    {
        $food = Food::with('foodstall')->findOrFail($id);
        return view('foods.show', compact('food'));
    }
}
