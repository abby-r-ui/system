<?php

namespace App\Http\Controllers;
use App\Models\Reviewer;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewerController extends Controller {
    public function index() {
        $reviewers = Reviewer::all();
        return view('reviewers.index', compact('reviewers'));
    }
                                
    public function store(Request $request) {
        Reviewer::create($request->all());
        return redirect()->route('reviewers.index')->with('success', 'Reviewer added!');
    }

    public function reviews($id) {
        $reviewer = Reviewer::findOrFail($id);
        $reviews = Review::where('reviewer_id', $id)->with('submission')->get();
        return view('reviewers.reviews', compact('reviewer', 'reviews'));
    }
}