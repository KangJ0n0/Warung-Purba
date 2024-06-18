<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodstall;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        //get all products
        $rekomendasi = Foodstall::where('foodstall_rating', 5)
        ->limit(3)
        ->get();
        $user = auth()->user(); // Get the currently authenticated user
        return view('dashboard', compact('rekomendasi', 'user'));
        //render view with products
    }

}
