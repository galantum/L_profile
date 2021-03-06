<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

//import User model
use App\User;
//import View
use View;
//import Redirect
use Illuminate\Support\Facades\Redirect;
//import Input
use Illuminate\Support\Facades\Input;
//import Validator
use Illuminate\Support\Facades\Validator;

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
        $input = Input::all();

        $validation = Validator::make($input, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
            ]);
            return Redirect::route('home', $id);
        }
        return Redirect::route('edit', $id)
                    ->withInput()
                    ->withErrors($validation)
                    ->with('message', 'There were validation errors.');
    }
}
