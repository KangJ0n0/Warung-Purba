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
        //get all foodstalls
        $foodstalls = Foodstall::latest()->paginate(10);

        //render view with foodstalls
        return view('warung', compact('foodstalls'));
    }

    public function show() : View
    {
        //get the selected foodstall by id
        $foodstall = Foodstall::where('foodstall_id', 1);

        //render view with the selected foodstall
        return view('dwarung', compact('foodstall'));
    }

    public function search(Request $request){
        $keyword = $request->search;

        $result = Foodstall::where('foodstall_name', 'like', '%' . $keyword . '%')->get();
        return view('resultwarung',
        [
            'keyword' => $keyword,
            'foodstalls' => $result
        ]);
    }

}
