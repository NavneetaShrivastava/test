<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile', compact('id'));
    }

    public function show($id)
{
    // other stuff here
    return view('profile', compact('id'));
}

public function store(Request $request)
{
    
   $this->validate($request,[
       'name' => 'required',
       'email' => 'required',
       'password' => 'required'

      
   ]);

   $new_user = new User();
   $new_user::find(2);
   $new_user->name = $request->input('name');
   $new_user->email = $request->input('email');
   $new_user->password =Hash::make($request['password']) ;
  
   $new_user->save();

    return redirect('/home');
   
}
}