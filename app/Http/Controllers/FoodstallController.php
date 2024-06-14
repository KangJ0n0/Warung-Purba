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
        $foodstalls = Foodstall::latest()->paginate(12);

        //render view with foodstalls
        return view('warung', compact('foodstalls'));
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

    public function show(string $foodstall_id): View
    {
        //get the selected foodstall by id
        $warung = Foodstall::findOrFail($foodstall_id);

        //render view with the selected foodstall
        return view('dwarung', compact('warung'));
    }

}
