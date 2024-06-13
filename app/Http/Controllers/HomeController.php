<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodstall;
use Illuminate\View\View;
class HomeController extends Controller
{
    public function index() : View
    {
        //get all products
        $rekomendasi = Foodstall::where('foodstall_rating', 5)
        ->limit(3)
        ->get();

        //render view with products
        return view('home', compact('rekomendasi'));
    }

}
