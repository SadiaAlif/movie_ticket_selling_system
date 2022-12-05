<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\MovieTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\TicketBook;
use Illuminate\Support\Facades\DB;
use Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search= $request['search']??"";
        if($search !=""){
            $movies= Movie::where('name','LIKE',"%$search%")
            -> orWhere('category_name','LIKE', "%$search%")->get();
        }
        else{
        $movies = Movie::latest()->get();
        }
        return view('admin.movie.index', compact('movies','search'));
    }

    public function create(Request $request)
    {
        $data =[
            'categories'    => Category::all(),
            'branches'      => Branch::all(),
        ];

        return view('admin.movie.create', $data);
    }

    protected function dataInserts($movie,$data)
    {
        if (array_key_exists('date',$data) && count($data['date']) > 0)
        {
            foreach ($data['date'] as $date) {
                $movieDate = $movie->movieDates()->create([
                    'date' => $date
                ]);

                if (array_key_exists('start_time',$data) && count($data['start_time']) > 0 && $data['start_time'][$date])
                {
                    foreach ($data['start_time'][$date] as $key => $startTime) {
                        $movieDate->movieTimes()->create([
                            'movie_id' => $movie->id,
                            'start_time' => $startTime,
                            'end_time' => $data['end_time'][$date][$key]
                        ]);
                    }
                }
            }
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'category_name' => 'required',
            'branch_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'booking_status' => 'required',
        ]);

        if($request->file('photo')){
            $photo = Storage::disk('public')->put('backend/img/movie', $request->file('photo'));
        }

        try {
            DB::beginTransaction();
            $movie = Movie::create([
                'name' => $request->name,
                'photo' => $photo,
                'category_name' => $request->category_name,
                'branch_name' => $request->branch_name,
                'description' => $request->description,
                'duration' => $request->duration,
                'price' => $request->price,
                'booking_status' => $request->booking_status,
            ]);
            $this->dataInserts($movie, $request->all());
            DB::commit();
            return redirect()->route('admin.movie.create')->with('success', 'Successfully add movie.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function edit($id)
    {
        $data =[
            'movie'         => Movie::find($id),
            'categories'    => Category::all(),
            'branches'      => Branch::all()
        ];

        return view('admin.movie.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable',
            'category_name' => 'required',
            'branch_name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'booking_status' => 'required'
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
        $movie->branch_name = $request->branch_name;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->price = $request->price;
        $movie->booking_status = $request->booking_status;
        $movie->update();
        $movie->movieDates()->delete();
        $movie->movieTimes()->delete();
        $this->dataInserts($movie,$request->all());


        return redirect()->route('admin.movie.index')->with('success', 'Successfully update movie.');
    }

    
    public function delete($id){
        $movie = Movie::find($id);

        $movie->delete();

        return redirect()->route('admin.movie.index');
    }

    public function details($id)
    {
        $data = [
            'movie'     => Movie::find($id),
            'branches'  => Branch::get()
        ];

        return view('frontend.details', $data);
    }
    
    public function buy_ticket(Request $request)
    {
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
            'qty' => 'required|numeric|min:1|max:20',
        ]);

        TicketBook::create($validated);


        $movie = Movie::find($request->movie_id);

        $movie->booking_status -= $request->qty;

        $movie->save();


        return redirect()->route('details', $request->movie_id)->with('success', 'Movie ticket buy successfully.');
    }

    public function movieTimes(Request $request): \Illuminate\Http\JsonResponse
    {
        $movieTimes = MovieTime::where('movie_id', $request->movie_id)->where('movie_date_id', $request->movie_date_id)->get();

        $options = "<option value=''>Select Time</option>";

        foreach ($movieTimes as $movieTime) {
            $options.= "<option value='".$movieTime->start_time." - ".$movieTime->end_time."'>".Carbon::parse($movieTime->start_time)->format('h:i A')." - ".Carbon::parse($movieTime->end_time)->format('h:i A')."</option>";
        }

        return response()->json($options);
    }
}
