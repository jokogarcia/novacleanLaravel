<?php

namespace App\Http\Controllers;

use App\AcademicExperience;
use Illuminate\Http\Request;

class AcademicExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
            $this->middleware('auth');
        }
    public function index($userId=null)
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
        return view("academic_experiences.create");
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
       $request['is_current'] = $request['is_current'] != null;
       $request->validate([
           'school_name'        =>  'required | string',
           'career'             =>  'required | string',
           'started_at'         =>  'required | date',
           'finished_at'        =>  'nullable | someteimes | date | after:started_at',
           'is_current'         =>  'boolean',
           'user_id'            =>  'required | integer'
       ]);
        
       
        $ae=AcademicExperience::create(request([
            'school_name',
            'career',
            'academic_level_id',
            'started_at',
            'finished_at',
            'is_current',
            'user_id'
        ]));
        if (auth()->user()->UserRole->role == "ADMIN") {
            return redirect('/users/' . $ae->user_id);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicExperience  $academicExperience
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicExperience $academicExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicExperience  $academicExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicExperience $academicExperience)
    {
        //
        //$academicExperience= AcademicExperience::find($id);
        return view('academic_experiences.edit',compact('academicExperience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicExperience  $academicExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicExperience $academicExperience)
    {
        //check if user is logged
        if(auth()->id()==null){
            return redirect('auth/login');
        }
        
        if ($request['user_id'] != auth()->id()) {
            abort(403);
        }
        //process checkbox
        $request['is_current'] = $request['is_current'] != null;
        $request->validate([
           'school_name'        =>  'required | string',
           'career'             =>  'required | string',
           'started_at'         =>  'required | date',
           'finished_at'        =>  'date | after:started_at',
           'is_current'         =>  'boolean',
       ]);
        $academicExperience->update(request([
            'school_name',
            'career',
            'academic_level_id',
            'started_at',
            'finished_at',
            'is_current',
        ]));
        return redirect('/users/'.auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicExperience  $academicExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicExperience $academicExperience)
    {
        //check if user is logged
        if(auth()->id()==null){
            return redirect('auth/login');
        }
        
        if ($academicExperience->user_id != auth()->id()) {
            abort(403);
        }
        $academicExperience->delete();
    }
}
