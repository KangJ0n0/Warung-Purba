<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() : View
    {
        //get all products
        $foods = Food::latest()->paginate(10);

        //render view with products
        return view('foods.home', compact('foods'));
    }
}
