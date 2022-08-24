<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketBook;

class UserController extends Controller
{
   
    
    public function index(Request $request){
        return view('admin.user.index');
    }

    public function ticket_list(Request $request){
        $tickets = TicketBook::where('user_id', auth()->user()->id)->get();
        return view('user.ticket_list', compact('tickets'));
    }
    public function invoice($id){

        $invoice= TicketBook::find($id);
        return view ('user.invoice', compact('invoice')); 
}
}
