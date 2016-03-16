<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

//import User model
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function edit($id){
        $user= User::find($id);

        if (is_null($user))
        {
            return Redirect::route('home');
        }
        return View::make('edit', compact('user'));

    }

    public function update($id){

    }
}
