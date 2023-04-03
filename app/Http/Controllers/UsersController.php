<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // Get All Users...
    function index(){
        $users = User::all();
        return view('users.index' , ['users'=>$users]);
    }
}
