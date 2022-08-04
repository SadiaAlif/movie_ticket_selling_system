<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    
    public function index(Request $request){

        $movies = Movie::get();

        return view('admin.movie.index', compact('movies'));
    }

    public function create(Request $request){
        return view('admin.movie.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Movie::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.movie.index');
    }

    public function delete($id){
        $movie = Movie::find($id);

        $movie->delete();

        return redirect()->route('admin.movie.index');
    }

}
