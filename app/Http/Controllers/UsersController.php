<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // Get All Users...
    function index(){
        $users = User::paginate(1);
        return view('users.index' , ['users'=>$users]);
    }
}
