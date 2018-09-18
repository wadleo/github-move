<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function user(Request $request) 
    {
    	$name = $request->name;
    	$user = User::where('name', 'like', '%'.$name.'%')->first();

    	return view('user', compact('user', 'name'));
    }

    public function saveUser(Request $request) 
    {
    	$user = new User();
    	$user->name = $request->name;
    	$user->dob = $request->dob;
    	$user->cob = $request->cob;
    	$user->save();

    	return view('user', compact('user'));
    }
}
