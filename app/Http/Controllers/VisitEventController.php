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
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/visit_events/create');
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
        $request['repeats'] = $request['repeats']=='on';
        $request['monday'] = $request['monday']=='on';
        $request['wednesday'] = $request['wednesday']=='on';
        $request['tuesday'] = $request['tuesday']=='on';
        $request['thursday'] = $request['thursday']=='on';
        $request['friday'] = $request['friday']=='on';
        $request['saturday'] = $request['saturday']=='on';
        $request['sunday'] = $request['sunday']=='on';
        
        $request->validate([
            'location_id'           =>  'required | numeric',
            'starts_at'             =>  'required | date_format:H:i',
            'duration'              =>  'required | date_format:H:i',
            'date'                  =>  'date|required',
            'repeats'               =>  'boolean',
            'monday'                =>  'boolean',
            'tuesday'               =>  'boolean',
            'wednesday'             =>  'boolean',
            'thursday'              =>  'boolean',
            'friday'                =>  'boolean',
            'saturday'              =>  'boolean',
            'sunday'                =>  'boolean'
        ]);
        $request['starting_date'] = $request['date'];
        $visitEvent = \App\VisitEvent::create(request([
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
        $tasks = explode(',',request('taskList'));
        $visitEvent->Tasks()->attach($tasks);

        
        return redirect('/locations/'.$visitEvent->location_id);
    }

    public function Show(VisitEvent $visitEvent){
        return view('/visit_events/show',compact('visitEvent'));
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
         $request['repeats'] = $request['repeats']=='on';
        $request['monday'] = $request['monday']=='on';
        $request['wednesday'] = $request['wednesday']=='on';
        $request['tuesday'] = $request['tuesday']=='on';
        $request['thursday'] = $request['thursday']=='on';
        $request['friday'] = $request['friday']=='on';
        $request['saturday'] = $request['saturday']=='on';
        $request['sunday'] = $request['sunday']=='on';
        $request->validate([
            'starts_at'             =>  'required |date_format:H:i',
            'duration'              =>   'required |date_format:H:i',
            'date'                  =>  'date|nullable',
            'starting_date'         =>  'date|nullable',
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
        $location_id = $visitEvent->Location->id;
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $visitEvent->delete();
        return redirect('/locations/'.$location_id);
    }
    public function ApiAttachTask(Request $request, VisitEvent $visitEvent){
        $taskId=$request['task_id'];
        $visitEvent->Tasks->attach($taskId);
    }
    public function ApiDetachTask(Request $request, VisitEvent $visitEvent){
        $taskId=$request['task_id'];
        $visitEvent->Tasks->detach($taskId);
    }
    public function ApiAttachEmployee(Request $request, VisitEvent $visitEvent){
        $taskId=$request['employee_id'];
        $visitEvent->Tasks->attach($taskId);
    }
    public function ApiDetachEmployee(Request $request, VisitEvent $visitEvent){
        $taskId=$request['employee_id'];
        $visitEvent->Tasks->detach($taskId);
    }
}
