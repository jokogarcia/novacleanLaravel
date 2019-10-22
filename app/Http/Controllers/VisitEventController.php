<?php

namespace App\Http\Controllers;

use App\VisitEvent;
use Illuminate\Http\Request;

class VisitEventController extends Controller
{
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'location_id'           =>  'required | numeric',
            'starts_at'             =>  'required | time',
            'duration'              =>   'required | time',
            'date'                  =>  'date',
            'starting_date'         =>  'date',
            'repeats'               =>  'boolean',
            'monday'                =>  'boolean',
            'tuesday'               =>  'boolean',
            'wednesday'             =>  'boolean',
            'thursday'              =>  'boolean',
            'friday'                =>  'boolean',
            'saturday'              =>  'boolean',
            'sunday'                =>  'boolean'
        ]);

        $visitEvent = App\User::create(request([
            'location_id',
            'starts_at',
            'duration',
            'date',
            'starting_date',
            'repeats',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday'
        ]));
        return redirect('/locations/'.$visitEvent->location_id);
    }

    
    public function ApiShow(VisitEvent $visitEvent){
        return $visitEvent;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitEvent  $visitEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitEvent $visitEvent)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'starts_at'             =>  'required | time',
            'duration'              =>   'required | time',
            'date'                  =>  'date',
            'starting_date'         =>  'date',
            'repeats'               =>  'boolean',
            'monday'                =>  'boolean',
            'tuesday'               =>  'boolean',
            'wednesday'             =>  'boolean',
            'thursday'              =>  'boolean',
            'friday'                =>  'boolean',
            'saturday'              =>  'boolean',
            'sunday'                =>  'boolean'
        ]);

        $visitEvent->update(request([
            'starts_at',
            'duration',
            'date',
            'starting_date',
            'repeats',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday'
        ]));
        return redirect('/locations/'.$visitEvent->location_id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisitEvent  $visitEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitEvent $visitEvent)
    {
        //
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $visitEvent->delete();
    }
}
