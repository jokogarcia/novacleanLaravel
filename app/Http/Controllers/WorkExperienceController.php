<?php

namespace App\Http\Controllers;

use App\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
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
          return view("work_experiences.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //check if user is logged
        if(auth()->id()==null){
            return redirect('auth/login');
        }
        $request['user_id']=auth()->id();

        $request->validate([
            'company_name'          =>  'required | string',
            'position'              =>  'required | string',
            'started_at'            =>  'required | date',
            'finished_at'           =>  'date | after:started_at',
            'is_current_job'        =>  'boolean',
            'reference_name'        =>  'string',
            'reference_email'       =>  'string',
            'reference_phone'       =>  'string',
            'user_id'               =>  'required | numeric',
            
        ]);
       
        WorkExperience::create(request([
            'company_name',
            'position',
            'started_at',
            'finished_at',
            'is_current_job',
            'reference_name',
            'reference_phone',
            'reference_email',
            'user_id'
        ]));
        return redirect('/users/'.auth()->id());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExperience $workExperience)
    {
        //
         return view('work_experiences.edit',compact('workExperience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
        //check if user is logged
        if(auth()->id()==null){
            return redirect('auth/login');
        }
        
        if ($request['user_id'] != auth()->id()) {
            abort(403);
        }

        $request['is_current_job'] = $request['is_current_job'] != null;
        
        $request->validate([
            'company_name'          =>  'required | string',
            'position'              =>  'required | string',
            'started_at'            =>  'required | date',
            'finished_at'           =>  'date | after:started_at',
            'is_current_job'        =>  'boolean',
            'reference_name'        =>  'string',
            'reference_email'       =>  'string',
            'reference_phone'       =>  'string',            
        ]);
        
        $workExperience->update(request([
            'company_name',
            'position',
            'started_at',
            'finished_at',
            'is_current_job',
            'reference_contact_id',
            
        ]));
        return redirect('/users/'.auth()->id());
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExperience $workExperience)
    {
        //
        //check if user is logged
        if(auth()->id()==null){
            return redirect('auth/login');
        }
        
        if ($workExperience->user_id != auth()->id()) {
            abort(403);
        }
        $workExperience->delete();
    }
}
