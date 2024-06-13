<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodstall;
use App\Models\Food;
use Illuminate\View\View;
class HomeController extends Controller
{
    public function index() : View
    {
        //get all products
        $rekomendasi = Foodstall::where('foodstall_rating', 5)
        ->limit(3)
        ->get();
        
        $makananTerbaru = Food::where('created_at', 'desc')
        ->take(3)
        ->get();

        //render view with products
        return view('home', [
            'rekomendasi' => $rekomendasi,
            'makanan' => $makananTerbaru
        ]);
    }

}
