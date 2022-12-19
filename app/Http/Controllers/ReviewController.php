<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required',
            'comment' => 'required',
        ]);
        try {
            Review::create([
                'user_id' => auth()->id(),
                'movie_id' => $request->movie_id,
                'rating' => $request->rate,
                'comment' => $request->comment,
            ]);
         
            return back()->with(['Success!!' => 'Review Added Successfully :)']);
        } catch (\Exception $e) {
            return back()->with(['Error!!' => 'Something Went Wrong']);
        }
    }
}

