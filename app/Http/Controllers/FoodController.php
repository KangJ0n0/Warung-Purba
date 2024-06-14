<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Requests;

class FoodController extends Controller
{
    public function index() : View
    {
        //get all products
        $foods = Food::latest()->paginate(12);

        //render view with products
        return view('makanan', compact('foods'));
    }

    public function search(Request $request){
        $keyword = $request->search;

        $result = Food::where('food_name', 'like', '%' . $keyword . '%')->get();
        return view('resultmakanan',
        [
            'keyword' => $keyword,
            'foods' => $result
        ]);
    }
}
