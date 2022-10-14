<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\TicketBook;

use Storage;

class MovieController extends Controller
{
    
    public function index(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $movies= Movie::where('name','LIKE',"%$search%")
            -> orWhere('category_name','LIKE', "%$search%")->get();
        }
        else{
        $movies = Movie::get();
        }
        return view('admin.movie.index', compact('movies','search'));
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
            'price' => 'required',
            'booking_status' => 'required',
            'show_time' => 'required',
            'show_date' => 'required'
    
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
            'price' => $request->price,
            'booking_status' => $request->booking_status,
            'show_time' => $request->show_time,
            'show_date' => $request->show_date
               
        ]);

        return redirect()->route('admin.movie.create')->with('success', 'Successfully add movie.');
    }

    public function edit($id){
        $movie = Movie::find($id);
        $categories= Category::get();
        return view('admin.movie.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'photo' => 'nullable',
            'category_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'booking_status' => 'required',
            'show_time' => 'required',
            'show_date' => 'required'
            
        ]);

        $movie = Movie::find($id);

        if($request->file('photo')){
            $photo = Storage::disk('public')->put('backend/img/movie', $request->file('photo'));
        }else{
            $photo = $movie->photo;
        }

        $movie->name = $request->name;
        $movie->photo = $photo;
        $movie->category_name = $request->category_name;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->price = $request->price;
        $movie->booking_status = $request->booking_status;
        $movie->show_time = $request->show_time;
        $movie->show_date = $request->show_date;
       


        $movie->update();
    
        return redirect()->route('admin.movie.index')->with('success', 'Successfully update movie.');
    }

    
    public function delete($id){
        $movie = Movie::find($id);

        $movie->delete();

        return redirect()->route('admin.movie.index');
    }

    public function details($id){
        $movie = Movie::find($id);

        return view('frontend.details', compact('movie'));
    }
    
    public function buy_ticket(Request $request){
        $validated = $request->validate([
            'ticket_number' => 'required',
            'movie_id' => 'required',
            'movie_name' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'price' => 'required',
            'method' => 'required',
            'tnx_id' => 'required',
            'show_time' => 'required',
            'show_date' => 'required',
            'branch' => 'required',
            'qty' => 'required',
            
        ]);
        

        TicketBook::create($validated);


        $movie = Movie::find($request->movie_id);

        $booking_status = $movie->booking_status;
        

        $movie->booking_status = $booking_status-1;

        $movie->save();


        return redirect()->route('details', $request->movie_id)->with('success', 'Movie ticket buy successfully.');
    }

    
}
