<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodstall;
use App\Models\Food;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() : View
    {
        $rekomendasiMakanan = Food::whereBetween('food_price', [7000, 10000])
            ->whereIn('food_name', function ($query) {
                $query->select(DB::raw('distinct food_name'))
                      ->from('food')
                      ->groupBy('food_name')
                      ->havingRaw('count(*) = 1');
            })
            ->orderBy('id') // Order by id in ascending order
            ->limit(3) // Limit to maximum 3 results
            ->get();
      
        $rekomendasiWarung = Foodstall::where('foodstall_rating', '>', 3)
            ->limit(3) // Limit to 3 results
            ->get();
        
        $user = auth()->user(); // Get the currently authenticated user
        
        return view('dashboard', compact('rekomendasiMakanan', 'rekomendasiWarung', 'user'));
    }
}
