<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use Storage;

class MovieController extends Controller
{
    
    public function index(Request $request){

        $movies = Movie::get();

        return view('admin.movie.index', compact('movies'));
    }

    public function create(Request $request){
        $categories= Category::get();
        return view('admin.movie.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'category_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);
        if($request->file('photo')){
            $photo = Storage::disk('public')->put('backend/img/movie', $request->file('photo'));
        }

        Movie::create([
            'name' => $request->name,
            'photo' => $photo,
            'category_name' => $request->category_name,
            'description' => $request->description,
            'duration' => $request->duration,
        ]);

        return redirect()->route('admin.movie.create')->with('success', 'Successfully add movie.');
    }

    public function delete($id){
        $movie = Movie::find($id);

        $movie->delete();

        return redirect()->route('admin.movie.index');
    }

}
