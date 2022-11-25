<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //construct
    public function __construct()
    {
        $this->middleware('auth');  
    }

    //display all users
    public function getAllUsers(){
        $pagetitle = "Allusers";

        $users = User::select('*')
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);

        return view('user', compact('pagetitle', 'users'));
    }

    public function getOneUser(){
        $pagetitle = "User Info";
        $oneuser = Auth::user();

        return view('userlogout', compact('pagetitle', 'oneuser'));
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}