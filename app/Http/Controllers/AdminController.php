<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\TicketBook;


class AdminController extends Controller
{
    public function dashboard()
    {
        $total_users = User::where('role', '2')->count();

        $movies = Movie::get();
        $total_movie = $movies->count();

        $sells = TicketBook::groupBy('show_date')->selectRaw('SUM(price) as amount,show_date')->whereMonth('show_date',date('m'))->whereYear('show_date',date('Y'))->get();

        $chart_data[] = ['Date', 'Amount'];

        foreach ($sells as $sell) {
            $chart_data[] = [$sell->show_date, $sell->amount];
        }

        $total_sell = TicketBook::count();

        $total_amount = TicketBook::sum('price');

        return view('admin.dashboard', compact('total_users', 'total_movie', 'total_sell', 'total_amount','chart_data'));
    }

    public function profile(Request $request) {
        return view ('admin.profile');
    }
    //Adash userList
    public function user_list(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $users= User::where('role', '2')->where('name', 'LIKE',"%$search%")
            -> orWhere('email','LIKE', "%$search%")->get();
            
        }
        else{
            $users = User::where('role', '2')->get();
        }
        return view ('admin.user.index', compact('users', 'search'));
    }
//contact form
    public function contact(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Message send successfully.');
    }
//Adash ticketlist
    public function ticket_list(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $tickets= TicketBook::where('user_name','LIKE',"%$search%")
            -> orWhere('movie_name','LIKE', "%$search%")->get();
        }
        
        else{
        $tickets = TicketBook::get();
        }
        return view('admin.ticket_list', compact('tickets','search'));
    }
//Adash contactlist
    public function contact_list(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $contacts= Contact::where('name','LIKE',"%$search%")
            -> orWhere('email','LIKE', "%$search%")->get();
        }
        else{
        $contacts = Contact::get();
        }
        return view('admin.contact_list', compact('contacts','search'));
    }


}