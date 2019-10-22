<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks/create');
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
            'description'           =>  'required | string',
            'duration'              =>  'time',
            'frequency'             =>  'numeric | required',
            'sector_id'           =>  'required | numeric',
        ]);
        $task=\App\Task::create(request([
            'description',
            'duration',
            'frecuency',
            'sector_id',
        ]));
        
        return redirect('/locations/'.$task->Sector->location_id."#sector".$task->Sector->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('tasks/edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
                $request->validate([
            'description'           =>  'required | string',
            'duration'              =>  'time',
            'frequency'             =>  'numeric | required',
        ]);
        $task->update(request([
            'description',
            'duration',
            'frecuency',
        ]));
        return redirect('/locations/'.$task->Sector->location_id."#sector".$task->Sector->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $task->delete();
    }
}
