<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sectors/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/* 'name'=>$SECTORES[$faker->numberBetween(0,count($SECTORES)-1)],
        'description'=>$faker->text,
        'area'=>$faker->numberBetween(10,1000)/10,
        'location_id'=>$faker->numberBetween(1,50)*/
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'name'                  =>  'required | string',
            'description'           =>  'string',
            'area'                  =>  'numeric',
            'location_id'           =>  'required | numeric',
        ]);
        $sector = \App\Sector::create(request([
            'name',
            'description',
            'area',
            'location_id',
        ]));
        
        return redirect('/locations/'.$sector->location_id."#sector".$sector->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        //
        return view("sectors/edit",compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'name'                  =>  'required | string',
            'description'           =>  'string',
            'area'                  =>  'numeric',
        ]);
        $sector->update(request([
            'name',
            'description',
            'area',
        ]));
        
        return redirect('/locations/'.$sector->location_id."#sector".$sector->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        //
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $sector->delete();
    }
}
