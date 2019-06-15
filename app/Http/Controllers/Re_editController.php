<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\controller;

class Re_editController extends Controller
{
    //

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
        return view('re_edit');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','unique:buildings'],
            'email' => ['required', 'string', 'max:255'],
           
        ]);
    }

    public function update(Request $request, User $users, $id)
    {
        $instance = static::firstOrNew($users);

        $instance->fill($request)->save();

        // User::whereId($id)->update($request->all());
        
       return redirect()->route('home');
       
    }

 

   
}
