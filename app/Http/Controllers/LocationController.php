<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
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
         //check if user is logged in and is administrator
       
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/locations/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/locations/create');
    }


    public function store(Request $request)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'name'                  =>  'required | string',
            'address_street_name'   =>  'required | string',
            'address_floor'         =>  'integer|nullable',
            'latitude'              =>  'numeric|nullable',
            'longitude'             =>  'numeric|nullable',
            'local_contact_name'    =>  'required | string',
            'local_contact_email'   =>  'string|nullable',
            'local_contact_phone'   =>  'string|nullable',
            'contract_number'       =>  'numeric|nullable',
            'supervisor_id'         =>  'required | numeric',
            'client_id'             =>  'required | numeric',
            'city_id'               =>  'required | numeric'
        ]);
         $location=\App\Location::create(request([
            'name',
            'address_street_name',
            'address_street_number',
            'address_floor',
            'address_appartment',
            'latitude',
            'longitude',
            'phone_number',
            'local_contact_name',
            'local_contact_email',
            'local_contact_phone',
            'contract_number',
            'supervisor_id',
            'client_id',
            'city_id'

        ]));

        return redirect('/users/'.$location->client_id.'#location'.$location->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
        return view('/locations/show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/locations/edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'name'                  =>  'required | string',
            'address_street_name'   =>  'required | string',
            'address_floor'         =>  'integer|nullable',
            'latitude'              =>  'numeric|nullable',
            'longitude'             =>  'numeric|nullable',
            'local_contact_name'    =>  'required|string',
            'local_contact_email'   =>  'string|nullable',
            'local_contact_phone'   =>  'string|nullable',
            'contract_number'       =>  'numeric|nullable',
            'supervisor_id'         =>  'required|numeric',
            'city_id'               =>  'required|numeric'
        ]);
        $location->update(request([
            'name',
            'address_street_name',
            'address_street_number',
            'address_floor',
            'address_appartment',
            'latitude',
            'longitude',
            'phone_number',
            'local_contact_name',
            'local_contact_email',
            'local_contact_phone',
            'contract_number',
            'supervisor_id',
            'city_id'
        ]));
        return redirect('/users/'.$location->client_id.'#location'.$location->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $location->delete();
    }
    public function ApiShow(Location $location){
        new \Illuminate\Http\JsonResponse($location);
    }
}
