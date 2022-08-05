<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function profile(Request $request) {
        return view ('admin.profile');
    }
    
    public function user_list(){
        $users = User::where('role', '2')->get();

        return view ('admin.user.index', compact('users'));
    }


}