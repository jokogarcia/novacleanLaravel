<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
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
        //
        $request->validate([
            'client_id'             =>  'required | numeric',
            'visit_event_id'        =>  'required | numeric',
            'comment'               =>  'string',
            'reference_date'        =>  'required | date',
            'complaint_type'        =>  'required | numeric',
            
        ]);
        
        $complaint = App\Complaint::create(request([
            'client_id',
            'visit_event_id',
            'comment',
            'reference_date',
            'complaint_type'
        ]));
        $_id = $complaint->id;
        if($request->has('photo')){
            $image = $request->file('photo');
            $name = "Complaint$_id";
            $folder = "/images/complaints/";
            $filePath = "$folder$name.".$image->getClientOriginalExtension();
            $this->uploadOne($image,$folder,'public',$name);
            $request['photo_url'] = $filePath;
        }
        $complaint->update(request(['photo_url']));
        return $complaint;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
