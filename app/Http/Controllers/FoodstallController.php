<?php

namespace App\Http\Controllers;

use App\Models\Foodstall; 
//import return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class FoodstallController extends Controller
{
      /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $foodstalls = Foodstall::latest()->paginate(10);

        //render view with products
        return view('foodstalls.home', compact('foodstalls'));
    }

    // public function warung() : View
    // {
    //     //get all products
    //     $foodstalls = Foodstall::latest()->paginate(10);

    //     //render view with products
    //     return view('foodstalls.warung', compact('foodstalls'));
        
    // }
}
