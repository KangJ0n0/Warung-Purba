<?php

namespace App\Http\Controllers;

use App\Models\Foodstall;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FoodstallController extends Controller
{
    public function index(Request $request) : View
    {
        $query = Foodstall::query();

        if ($request->filled('search')) {
            $query->where('foodstall_name', 'like', '%' . $request->search . '%')
                  ->orWhere('foodstall_location', 'like', '%' . $request->search . '%')
                  ->orWhere('foodstall_desc', 'like', '%' . $request->search . '%');
        }

        $foodstalls = $query->latest()->paginate(10);

        return view('warung', compact('foodstalls'));
    }

    public function create()
    {
        return view('foodstalls.create');
    }

    public function show($id)
    {
        $foodstall = Foodstall::findOrFail($id);

        return view('foodstalls.show', compact('foodstall'));
    }
    
}
