<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function index(){
        return view('dwarung', [
            'reviews' => Review::latest()->get()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'review' => 'required',
            'foodstall_id' => 'required',
            'account_id' => 'required',
        ]);

        Review::create([
            'account_id' => 1,
            'review' => $request->review,
            'foodstall_id' => 1,
        ]);

        return to_route('dwarung');
    }
}
