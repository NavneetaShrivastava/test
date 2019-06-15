<?php

namespace App\Http\Controllers\Admin;

use App\buildings;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;


class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function index()
    {
        //
        $buildings = Buildings::all();
        //return view('buildings');
        return view('admin.buildings.buildings', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'b_name' => ['required', 'string', 'max:255','unique:buildings'],
            'b_email' => ['required', 'string', 'max:255'],
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        return view('admin.buildings.new_buildings');
      

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            Buildings::create($request->all());
            return redirect()->route('admin.buildings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function show(buildings $buildings)
    {
        //
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function edit(buildings $buildings, $id)
    {
        //
      
        return view('admin.buildings.edit_re', with(['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buildings $buildings,$id)
    {
        //
    
        Buildings::whereId($id)->update($request->except(['_token','_method']));
        
          return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function destroy(buildings $buildings, $id)
    {
        Buildings::whereId($id)->delete();
        return redirect()->route('home');
        
    }
}
