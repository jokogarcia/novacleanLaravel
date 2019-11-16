<?php

namespace App\Http\Controllers;

use App\Raiting;
use Illuminate\Http\Request;

class RaitingController extends Controller
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
    public function ApiStore(Request $request)
    {
        //
         //
        $request->validate([
            'visit_event_id'        =>  'required | numeric',
            'reference_date'        =>  'required | date',
            'raiting'               =>  'required | numeric',
            
        ]);
        $request['client_id']= auth()->id();
        $raiting=\App\Raiting::create(request([
            'client_id',
            'visit_event_id',
            'reference_date',
            'raiting'
        ]));
        return $raiting;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Raiting  $raiting
     * @return \Illuminate\Http\Response
     */
    public function show(Raiting $raiting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raiting  $raiting
     * @return \Illuminate\Http\Response
     */
    public function edit(Raiting $raiting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raiting  $raiting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raiting $raiting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raiting  $raiting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raiting $raiting)
    {
        //
    }
}
