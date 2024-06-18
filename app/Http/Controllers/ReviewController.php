<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Foodstall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function store(Request $request, $foodstallId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'picture' => 'nullable|image|max:2048',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->foodstall_id = $foodstallId;
        $review->comment = $request->comment;
        $review->rating = $request->rating;

        if ($request->hasFile('picture')) {
            $review->picture = $request->file('picture')->store('review_pictures', 'public');
        }

        $review->save();

        return redirect()->route('foodstalls.show', $foodstallId)->with('success', 'Review added successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('foodstalls.show', $review->foodstall_id)->with('error', 'Unauthorized access.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('foodstalls.show', $review->foodstall_id)->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'picture' => 'nullable|image|max:2048',
        ]);

        $review->comment = $request->comment;
        $review->rating = $request->rating;

        if ($request->hasFile('picture')) {
            if ($review->picture) {
                Storage::disk('public')->delete($review->picture);
            }
            $review->picture = $request->file('picture')->store('review_pictures', 'public');
        }

        $review->save();

        return redirect()->route('foodstalls.show', $review->foodstall_id)->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('foodstalls.show', $review->foodstall_id)->with('error', 'Unauthorized access.');
        }

        if ($review->picture) {
            Storage::disk('public')->delete($review->picture);
        }

        $review->delete();

        return redirect()->route('foodstalls.show', $review->foodstall_id)->with('success', 'Review deleted successfully.');
    }
}
