<?php

namespace App\Http\Controllers;

use App\AttendanceLog;
use Illuminate\Http\Request;

class AttendanceLogController extends Controller
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
        $user = auth()->user();
        $request->validate([
            'visit_event_id'          =>  'required | numeric',
            'latitude'     =>  'required | numeric',
            'longitude'         =>  'required | numeric',
        ]);
        $request['employee_id']=$user->id;
        \App\AttendanceLog::create(request([
            'visit_event_id',
            'latitude',
            'longitude',
            'employee_id'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceLog $attendanceLog)
    {
        //
    }
}
